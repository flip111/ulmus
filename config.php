<?php
use Phergie\Irc\Connection;

return [
  'plugins' => [
    new \Phergie\Irc\Plugin\React\Pong\Plugin,
    new \Phergie\Irc\Plugin\React\AutoJoin\Plugin([
      'channels' => '#elm-bot'
    ]),

    // Dependencies of FeedTicker
    new \WyriHaximus\Phergie\Plugin\Dns\Plugin,
    new \WyriHaximus\Phergie\Plugin\Http\Plugin,

    new \Phergie\Irc\Plugin\React\FeedTicker\Plugin([
      'urls' => [
          'https://groups.google.com/forum/feed/elm-discuss/msgs/atom.xml?num=50'
      ],
      'targets' => [
        'ulmus!ulmus@wilhelm.freenode.net' => [
          '#elm-bot'
        ]
      ],
      'interval' => 300,
      'formatter' => new Phergie\Irc\Plugin\React\FeedTicker\DefaultFormatter(
          '%title% [ %link% ] by %authorname% at %datemodified%',
          'Y-m-d H:i:s'
      ),
    ])
  ],

  'connections' => [
    new Connection([
      'serverHostname' => 'wilhelm.freenode.net',
      'username' => 'ulmus',
      'realname' => 'Elm irc bot',
      'nickname' => 'ulmus',
      'serverport' => 6697,
      'options' => [
        'transport' => 'ssl'
      ]
    ]),
  ]
];
