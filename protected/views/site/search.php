<?php
Yii::app()->user->setFlash('info', 'This will be implemented very soon on  '.__FILE__);
Yii::app()->user->setFlash('block', 'Your search query:');
Main::out($_GET);
