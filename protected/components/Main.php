<?php
/**
 * This will handle all generic components.
 * @author Ramkrishna Chaulagain <rkcbabu@gmail.com>
 */
Class Main  {
	public static function menu($default = null){
		return array(
				//array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Collections', 'url'=>array('/collection/index')),
				//array('label'=>'PhotoBhooth', 'url'=>array('/site/imagecollage')),
				//array('label'=>'Invitations', 'url'=>array('/site/invitations')),
				array('label'=>'Account', 'url'=>array('/user/view')),
				array('label'=>'Contact', 'url'=>array('/site/contact'),'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest)
		);
	}
	//PhotoBhooth
	public static function out($expression=null,$dump=null,$exit=null){
		if(!is_null($dump))
			var_dump($expression);
		else{
			if($expression==null){
				var_dump($expression);
				$expression = $_POST;
			}
				
			echo '<pre>';
			print_r($expression);
			echo '</pre>';
		}
		//if ($exit==null){exit;}
	}
	public static function rank($sum){
		$ranks = Rank::model()->findAll(); //array('order'=>'max_point desc')
		$flag = false;
		$temp = null;
		foreach($ranks as $rank ){
			$temp = $rank;
			//Main::out($rank->attributes);
			if($sum <= $rank->max_point){
				break;
			}
		}
		return $temp->name;
	}
	public static function date_diff($created,$out_in_array=false){
		$message = '';
		$diff_time = strtotime(date('Y-m-d H:i:s'))-strtotime($created); // in seconds
		if($out_in_array)
			return $diff_time;
		$day = (int)($diff_time / 86400);
		if($day > 1){
			$message.= date('Y-m-d g:i a',strtotime($created));
		}elseif ($day == 1){
			$message.='Yesterday at '.date('g:i a',strtotime($created));
		}else{
			$hour =(int)($diff_time / 3600);
			if($hour==1)
				$message.='About '.$hour.' hour ago.';
			elseif($hour>0)
			$message.='About '.$hour.' hours ago.';
			else{
				$min =(int)($diff_time / 60);
				if($min==1)
					$message.='About '.$min.' minute ago.';
				elseif($min>0)
				$message.='About '.$min.' minutes ago.';
				else
					$message.= 'About few seconds ago.';
			}
		}
		return $message;
	}
	public static function thumb($model,$WSize=50,$link=true,$print=true){
		if($model==null)return null;

		$cname = strtolower(get_class($model));

		$root = Yii::app()->params->isAdmin ? dirname(Yii::app()->baseUrl):Yii::app()->baseUrl;

		if($WSize<=60)$size ='small';elseif ($WSize>60 and $WSize<=300)$size='medium';elseif ($WSize>300 and $WSize<=500) $size ='big' ; else $size='profile';

		//$file = $root.'/images/'.$cname.'/thumb/'.$size.'/'.$model->picture->name;
		$file = isset($model->image->name) ?
			$root.'/images/'.$cname.'/thumb/'.$size.'/'.$model->image->name:
			Yii::app()->baseUrl.'/images/assets/default_user.jpg';

		if (isset($model->title))$title=$model->title;
		elseif (isset($model->name))$title=$model->name;
		elseif (isset($model->username))$title=$model->username;
		elseif (isset($model->firstname))$title=$model->firstname;
		else $title=$cname.'_'.$model->id;

		$image = CHtml::image($file,$cname.'_'.$model->id,array('width'=>$WSize,'title'=> $title));

		if($link){
			/* if($cname=='individual')
				$image = CHtml::link($image,array('/'.$model->username));
			else */
			$image = CHtml::link($image,array('/'.$cname.'/'.$model->id));
		}
		if($print)echo $image;else return $image;
	}
	public static function link($model=null,$print=false){
		if($model == null){
			$link = Yii::app()->homeUrl;
		}else{
			$cname = strtolower(get_class($model));
			$title = ($cname =='user')? $model->firstname:$model->name;
			/* if (Yii::app()->params->isAdmin){
				$link = CHtml::link(ucfirst($title),dirname(Yii::app()->baseUrl).'/'.$cname.'/'.$model->id);
			}else{
				$link = CHtml::link(ucfirst($title),array('/'.$cname.'/'.$model->id));
			} */
			$link = CHtml::link(ucfirst($title),array('/'.$cname.'/'.$model->id));
		}
		if ($print)
			echo $link;
		else
			return $link;
	}
	public static function hash($security_code){
		return sha1($security_code);
	}
	public static function adminmenu($default = null){
		$folder=dir(Yii::getPathOfAlias('application').'/controllers/');
		$menu = array();
		//$menu[]=array('label'=>'Frontend', 'url'=>dirname(Yii::app()->homeUrl));
		if(!Yii::app()->user->isGuest){
			//$menu[]=array('label'=>"Dashboard", 'url'=>array('/site/index'));
			while($folderEntry=$folder->read())
			{
				$content = basename($folderEntry,'Controller.php');
				$content = basename($content,'.');
				if($default === null and $content == 'Site');
				//$menu[]=array('label'=>"Dashboard", 'url'=>array('/'.strtolower($content).'/index'));
				if($content == '.' || $content == 'Site' )
					continue;
				$menu[]=array('label'=>$content, 'url'=>array('/'.$content.'/admin'));
			}
			$folder->close();
			if($default !== null){
				$menu[]=array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'));
				$menu[]=array('label'=>'Contact', 'url'=>array('/site/contact'));
			}
		}
		//$menu[]=array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest);
		//$menu[]=array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest);
		return $menu;
	}
	public static function setExtra($model,$data){
		if($model!==null and is_array($data) and !empty($data)){
			$extra = self::getExtra($model,true);
			$keys = array_keys($data);
			foreach ($data[$keys[0]] as $key=>$value){
				$extra[$keys[0]][$key]=$value;
			}
			$model->extra = json_encode($extra);
			$model->save(false);
			return true;
		}else{
			throw new CException('There may be empty or incorrect data to be stored.');
			//Yii::app()->user->setFlash('notice', 'There may be empty or incorrect data to be stored.');
			//return false;
		}
	}
	public static function getExtra($model,$isArray = false){
		if($model!==null){
			if($model->extra !=null){
				return json_decode($model->extra,$isArray);
			}else{
				return array();
			}
		}else{
			return array();
		}
	}
	public static function setSession($key,$value){
		if(!empty($key)/*  and !empty($value) */){
			Yii::app()->user->setState($key, json_encode($value));
			return true;
		}else{
			return false;
		}
	}
	public static function getSession($key,$isArray=null){
		return json_decode(Yii::app()->user->getState($key),$isArray);
	}
	public static function points($variable) {
		$variable=round($variable);
		$num= (string)$variable;
		for($i=0;$i<(3-strlen($num));$i++)
			$arr[$i] = 0;
		for($j=0;$j<strlen($num);$j++)
			$arr[$j+$i] = $num[$j];
		return $arr;
	}
	public static function getRank($model){
		$total = $model->point->total;
		$lowerLimit = 0;
		$rank=null;
		foreach(Rank::model()->findAll() as $rank){
			if($total>=$lowerLimit and $total<$rank->max_point){
				break;
			}else{
				$lowerLimit = $rank->max_point;
				continue;
			}
		}
		return strtolower($rank->name);
			
	}
	public static function isFriend($model){
		if (is_null($individual = Main::user()))return null;
		if ($model->id == $individual->id)
			return '1';
		$newFriend = Friend::model()->find('((individual_id='.$model->id.' and friend_id='.$individual->id.') || (individual_id ='.$individual->id.' and friend_id='.$model->id.'))');
		if ($newFriend == null){
			return 0;
		}else{
			return $newFriend->status;
		}
	}
	public static function isMyCommunity($model){
		if (Yii::app()->user->isGuest){
			return false;
		}
		$newJoin = CommunityMember::model()->find('community_id='.$model->id.'&& individual_id='.Yii::app()->user->id);
		return is_null($newJoin)?0:$newJoin->status;
	}
	public static function adminCLEditor($thisController,$model,$attribute){
		$thisController->widget('fext.cleditor.ECLEditor', array(
				'model'=>$model,
				'attribute'=>$attribute, //Model attribute name. Nome do atributo do modelo.
				'options'=>array(
						'width'=>'100%',
						'height'=>'300',
						'useCSS'=>true,
				),
				'value'=>$model->{$attribute}, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
				'htmlOptions'=>array('class'=>'cleditorMain'),		
		));
	}
	public static function user(){
		if(Yii::app()->user->isGuest){
			//$_GET['id'] must be individual id.
			if (isset($_GET['id'])){
				return Individual::model()->findByPk($_GET['id']);
			}else{
				return null;
			}
		}else{
			return Individual::model()->findByPk(Yii::app()->user->id);
		}
	}
	public static function FriendLink($friend,$print=true,$unfriendDiplay = false){
		$individual = Main::user();
		if (is_null($individual))return ;
		$friendship = Friend::model()->find('(individual_id='.$friend->id.' and friend_id='.$individual->id.') ||
				(individual_id ='.$individual->id.' and friend_id='.$friend->id.')');
		$status = is_null($friendship)?'0':$friendship->status;
		$content = null;
		switch ($status){
			case 0:
				if(!(Yii::app()->user->id === $friend->id) and !Yii::app()->user->isGuest){
					$content .= CHtml::form(array('/individual/friend/'.$friend->id));
					$content .= CHtml::hiddenField('individual_id',$friend->id);
					$content .= CHtml::submitButton('Make Friend',array('class'=>'friend_sarch_btn'));
					$content .= CHtml::endForm();
				}
				break;
			case 1:
				if (Yii::app()->user->isGuest)break;
				if(!(Yii::app()->user->id === $friend->id) and $unfriendDiplay){
					$content .= CHtml::form(array('/individual/friend/unfriend/'.$friend->id));
					$content .= CHtml::hiddenField('individual_id',$friend->id);
					$content .= CHtml::submitButton('Unfriend',array('class'=>'friend_sarch_btn','onclick'=>"return confirm('Are you sure to unfriend ?')"));
					$content .= CHtml::endForm();
				}
				break;
			case 2:
				if (Yii::app()->user->isGuest)break;
				if ($friendship->individual_id == Yii::app()->user->id){
					$content .= CHtml::button('Request Sent',array('class'=>'friend_sarch_btn'));
				}else{
					$content .= CHtml::form(array('/individual/friend/accept/'.$friend->id));
					$content .= CHtml::hiddenField('individual_id',$friend->id);
					$content .= CHtml::submitButton('Accept',array('class'=>'friend_sarch_btn'));
					$content .= CHtml::endForm();
				}
				break;
			default:
				break;
		}
		if($print){
			echo $content;
		}else{
			return $content;
		}
	}
	public static function CommunityLink($community,$print=true,$leave=false){
		if (is_null($individual = Main::user()))throw new CException('Respective user is null.');
		if (is_null($community))throw new CException('Respective community is null.');
		else $membership = CommunityMember::model()->find('community_id='.$community->id.' and individual_id='.$individual->id);
		$content = null;
		if (is_null($membership)){
			$content .= CHtml::form(array('/community/member/join/'.$community->id));
			$content .= CHtml::hiddenField('individual_id',$individual->id);
			$content .= CHtml::submitButton('Join',array('class'=>'friend_sarch_btn'));
			$content .= CHtml::endForm();
		}else{
			switch ($membership->status){
				case 0: // for deactive membership.
					$content .= CHtml::form(array('/community/member/join/'.$community->id));
					$content .= CHtml::hiddenField('individual_id',$individual->id);
					$content .= CHtml::submitButton('Join',array('class'=>'friend_sarch_btn'));
					$content .= CHtml::endForm();
					break;
				case 1:
					if(!(Yii::app()->user->id === $community->owner->id) and $leave){
						$content .= CHtml::form(array('/community/member/leave/'.$community->id));
						$content .= CHtml::hiddenField('individual_id',$individual->id);
						$content .= CHtml::submitButton('Leave',array('class'=>'friend_sarch_btn','onclick'=>"return confirm('Are you sure to leave this community ?')"));
						$content .= CHtml::endForm();
					}else{
						//$content.=CHtml::link('Settings',array('/community/requests/'.$community->id),array('class'=>'friend_sarch_btn'));
						//$content.=CHtml::button('Requests',array('class'=>'friend_sarch_btn','onclick'=>Yii::app()->homeUrl));
					}
					break;
				case 2:
					$content .= CHtml::button('Request Sent',array('class'=>'friend_sarch_btn'));
					break;
				default:
					break;
			}
		}
		if($print){
			echo $content;
		}else{
			return $content;
		}
	}
	public static function staticContent($key){
		$model = StaticPages::model()->findByAttributes(array('title'=>trim($key)));
		if (is_null($model)){
		}else{
			echo $model->content;
		}
	}
	public static function Fdate($date){
		return Main::date_diff($date);
	}
	public static function displayFlashes(){
		foreach (Yii::app()->user->getFlashes() as $key => $message){
			echo '<div class="nNote n'.ucfirst($key).'"><p>'.$message.'</p></div>';
		}
	}
	public static function getRecipientType($type){
		if ($type =='0'){
			return 'Person';
		}elseif ($type == '1'){
			return "Cause";
		}elseif ($type =='2'){
			return "Organization";
		}
	}
}
