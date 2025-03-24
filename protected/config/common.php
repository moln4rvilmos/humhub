<?php
/**
 * This file provides to overwrite the default HumHub / Yii configuration by your local common (Console and Web) environments
 * @see http://www.yiiframework.com/doc-2.0/guide-concept-configurations.html
 * @see http://docs.humhub.org/admin-installation-configuration.html
 * @see http://docs.humhub.org/dev-environment.html
 */
return [
    'components' => [
        'urlManager' => [
            'showScriptName' => false,
            'enablePrettyUrl' => true,
        ],
    ],
   'modules' => [
       'user' => [
             'displayNameCallback' => function($user) {
                  // A keleti nyelvek: magyar, mongol, japán, koreai, kínai, khmer
                  $easternLanguages = ['hu', 'mn', 'ja', 'ko', 'zh', 'km'];
                  if (in_array(Yii::$app->language, $easternLanguages)) {
                      return $user->profile->lastname.' '.$user->profile->firstname;
                  }
                  // Más nyelveken marad a "Keresztnév Vezetéknév" formátum
                  return $user->profile->firstname.' '.$user->profile->lastname;
             }
       ],
  ]
];
