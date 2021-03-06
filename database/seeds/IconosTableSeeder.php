<?php

use Illuminate\Database\Seeder;

class IconosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('iconos')->insert([
            ['titulo' => '500px' , 'datos' => '{"nombre": "500px", "icono": "socicon-500px", "color": "#58a9de"}'],
            ['titulo' => '8tracks' , 'datos' => '{"nombre": "8tracks", "icono": "socicon-8tracks", "color": "#122c4b"}'],
            ['titulo' => 'Airbnb' , 'datos' => '{"nombre": "airbnb", "icono": "socicon-airbnb", "color": "#ff5a5f"}'],
            ['titulo' => 'Alliance' , 'datos' => '{"nombre": "alliance", "icono": "socicon-alliance", "color": "#144587"}'],
            ['titulo' => 'Amazon' , 'datos' => '{"nombre": "amazon", "icono": "socicon-amazon", "color": "#ff9900"}'],
            ['titulo' => 'Amplement' , 'datos' => '{"nombre": "amplement", "icono": "socicon-amplement", "color": "#0996c3"}'],
            ['titulo' => 'Android' , 'datos' => '{"nombre": "android", "icono": "socicon-android", "color": "#8ec047"}'],
            ['titulo' => 'Angellist' , 'datos' => '{"nombre": "angellist", "icono": "socicon-angellist", "color": "#000000"}'],
            ['titulo' => 'Apple' , 'datos' => '{"nombre": "apple", "icono": "socicon-apple", "color": "#B9BFC1"}'],
            ['titulo' => 'Appnet' , 'datos' => '{"nombre": "appnet", "icono": "socicon-appnet", "color": "#494949"}'],
            ['titulo' => 'Baidu' , 'datos' => '{"nombre": "baidu", "icono": "socicon-baidu", "color": "#2629d9"}'],
            ['titulo' => 'Bandcamp' , 'datos' => '{"nombre": "bandcamp", "icono": "socicon-bandcamp", "color": "#619aa9"}'],
            ['titulo' => 'Battlenet' , 'datos' => '{"nombre": "battlenet", "icono": "socicon-battlenet", "color": "#0096CD"}'],
            ['titulo' => 'Mixer' , 'datos' => '{"nombre": "mixer", "icono": "socicon-mixer", "color": "#1FBAED"}'],
            ['titulo' => 'Bebee' , 'datos' => '{"nombre": "bebee", "icono": "socicon-bebee", "color": "#f28f16"}'],
            ['titulo' => 'Bebo' , 'datos' => '{"nombre": "bebo", "icono": "socicon-bebo", "color": "#EF1011"}'],
            ['titulo' => 'Behance' , 'datos' => '{"nombre": "behance", "icono": "socicon-behance", "color": "#000000"}'],
            ['titulo' => 'Blizzard' , 'datos' => '{"nombre": "blizzard", "icono": "socicon-blizzard", "color": "#01B2F1"}'],
            ['titulo' => 'Blogger' , 'datos' => '{"nombre": "blogger", "icono": "socicon-blogger", "color": "#ec661c"}'],
            ['titulo' => 'Buffer' , 'datos' => '{"nombre": "buffer", "icono": "socicon-buffer", "color": "#000000"}'],
            ['titulo' => 'Chrome' , 'datos' => '{"nombre": "chrome", "icono": "socicon-chrome", "color": "#757575"}'],
            ['titulo' => 'Coderwall' , 'datos' => '{"nombre": "coderwall", "icono": "socicon-coderwall", "color": "#3E8DCC"}'],
            ['titulo' => 'Curse' , 'datos' => '{"nombre": "curse", "icono": "socicon-curse", "color": "#f26522"}'],
            ['titulo' => 'Dailymotion' , 'datos' => '{"nombre": "dailymotion", "icono": "socicon-dailymotion", "color": "#004e72"}'],
            ['titulo' => 'Deezer' , 'datos' => '{"nombre": "deezer", "icono": "socicon-deezer", "color": "#32323d"}'],
            ['titulo' => 'Delicious' , 'datos' => '{"nombre": "delicious", "icono": "socicon-delicious", "color": "#020202"}'],
            ['titulo' => 'Deviantart' , 'datos' => '{"nombre": "deviantart", "icono": "socicon-deviantart", "color": "#c5d200"}'],
            ['titulo' => 'Diablo' , 'datos' => '{"nombre": "diablo", "icono": "socicon-diablo", "color": "#8B1209"}'],
            ['titulo' => 'Digg' , 'datos' => '{"nombre": "digg", "icono": "socicon-digg", "color": "#1d1d1b"}'],
            ['titulo' => 'Discord' , 'datos' => '{"nombre": "discord", "icono": "socicon-discord", "color": "#7289da"}'],
            ['titulo' => 'Disqus' , 'datos' => '{"nombre": "disqus", "icono": "socicon-disqus", "color": "#2e9fff"}'],
            ['titulo' => 'Douban' , 'datos' => '{"nombre": "douban", "icono": "socicon-douban", "color": "#3ca353"}'],
            ['titulo' => 'Draugiem' , 'datos' => '{"nombre": "draugiem", "icono": "socicon-draugiem", "color": "#ffa32b"}'],
            ['titulo' => 'Dribbble' , 'datos' => '{"nombre": "dribbble", "icono": "socicon-dribbble", "color": "#e84d88"}'],
            ['titulo' => 'Drupal' , 'datos' => '{"nombre": "drupal", "icono": "socicon-drupal", "color": "#00598e"}'],
            ['titulo' => 'Ebay' , 'datos' => '{"nombre": "ebay", "icono": "socicon-ebay", "color": "#333333"}'],
            ['titulo' => 'Ello' , 'datos' => '{"nombre": "ello", "icono": "socicon-ello", "color": "#000000"}'],
            ['titulo' => 'Endomondo' , 'datos' => '{"nombre": "endomondo", "icono": "socicon-endomondo", "color": "#86ad00"}'],
            ['titulo' => 'Envato' , 'datos' => '{"nombre": "envato", "icono": "socicon-envato", "color": "#597c3a"}'],
            ['titulo' => 'Etsy' , 'datos' => '{"nombre": "etsy", "icono": "socicon-etsy", "color": "#F56400"}'],
            ['titulo' => 'Facebook' , 'datos' => '{"nombre": "facebook", "icono": "socicon-facebook", "color": "#3e5b98"}'],
            ['titulo' => 'Feedburner' , 'datos' => '{"nombre": "feedburner", "icono": "socicon-feedburner", "color": "#ffcc00"}'],
            ['titulo' => 'Filmweb' , 'datos' => '{"nombre": "filmweb", "icono": "socicon-filmweb", "color": "#ffc404"}'],
            ['titulo' => 'Firefox' , 'datos' => '{"nombre": "firefox", "icono": "socicon-firefox", "color": "#484848"}'],
            ['titulo' => 'Flattr' , 'datos' => '{"nombre": "flattr", "icono": "socicon-flattr", "color": "#F67C1A"}'],
            ['titulo' => 'Flickr' , 'datos' => '{"nombre": "flickr", "icono": "socicon-flickr", "color": "#1e1e1b"}'],
            ['titulo' => 'Formulr' , 'datos' => '{"nombre": "formulr", "icono": "socicon-formulr", "color": "#ff5a60"}'],
            ['titulo' => 'Forrst' , 'datos' => '{"nombre": "forrst", "icono": "socicon-forrst", "color": "#5B9A68"}'],
            ['titulo' => 'Foursquare' , 'datos' => '{"nombre": "foursquare", "icono": "socicon-foursquare", "color": "#f94877"}'],
            ['titulo' => 'Friendfeed' , 'datos' => '{"nombre": "friendfeed", "icono": "socicon-friendfeed", "color": "#2F72C4"}'],
            ['titulo' => 'Github' , 'datos' => '{"nombre": "github", "icono": "socicon-github", "color": "#221e1b"}'],
            ['titulo' => 'Goodreads' , 'datos' => '{"nombre": "goodreads", "icono": "socicon-goodreads", "color": "#463020"}'],
            ['titulo' => 'Google' , 'datos' => '{"nombre": "google", "icono": "socicon-google", "color": "#4285f4"}'],
            ['titulo' => 'Googlegroups' , 'datos' => '{"nombre": "googlegroups", "icono": "socicon-googlegroups", "color": "#4F8EF5"}'],
            ['titulo' => 'Googlephotos' , 'datos' => '{"nombre": "googlephotos", "icono": "socicon-googlephotos", "color": "#212121"}'],
            ['titulo' => 'Googleplus' , 'datos' => '{"nombre": "googleplus", "icono": "socicon-googleplus", "color": "#dd4b39"}'],
            ['titulo' => 'Googlescholar' , 'datos' => '{"nombre": "googlescholar", "icono": "socicon-googlescholar", "color": "#4285f4"}'],
            ['titulo' => 'Grooveshark' , 'datos' => '{"nombre": "grooveshark", "icono": "socicon-grooveshark", "color": "#000000"}'],
            ['titulo' => 'Hackerrank' , 'datos' => '{"nombre": "hackerrank", "icono": "socicon-hackerrank", "color": "#2ec866"}'],
            ['titulo' => 'Hearthstone' , 'datos' => '{"nombre": "hearthstone", "icono": "socicon-hearthstone", "color": "#EC9313"}'],
            ['titulo' => 'Hellocoton' , 'datos' => '{"nombre": "hellocoton", "icono": "socicon-hellocoton", "color": "#d30d66"}'],
            ['titulo' => 'Heroes' , 'datos' => '{"nombre": "heroes", "icono": "socicon-heroes", "color": "#2397F7"}'],
            ['titulo' => 'Hitbox' , 'datos' => '{"nombre": "hitbox", "icono": "socicon-hitbox", "color": "#99CC00"}'],
            ['titulo' => 'Horde' , 'datos' => '{"nombre": "horde", "icono": "socicon-horde", "color": "#84121C"}'],
            ['titulo' => 'Houzz' , 'datos' => '{"nombre": "houzz", "icono": "socicon-houzz", "color": "#7CC04B"}'],
            ['titulo' => 'Icq' , 'datos' => '{"nombre": "icq", "icono": "socicon-icq", "color": "#7EBD00"}'],
            ['titulo' => 'Identica' , 'datos' => '{"nombre": "identica", "icono": "socicon-identica", "color": "#000000"}'],
            ['titulo' => 'Imdb' , 'datos' => '{"nombre": "imdb", "icono": "socicon-imdb", "color": "#E8BA00"}'],
            ['titulo' => 'Instagram' , 'datos' => '{"nombre": "instagram", "icono": "socicon-instagram", "color": "#000000"}'],
            ['titulo' => 'Issuu' , 'datos' => '{"nombre": "issuu", "icono": "socicon-issuu", "color": "#F26F61"}'],
            ['titulo' => 'Istock' , 'datos' => '{"nombre": "istock", "icono": "socicon-istock", "color": "#000000"}'],
            ['titulo' => 'Itunes' , 'datos' => '{"nombre": "itunes", "icono": "socicon-itunes", "color": "#ff5e51"}'],
            ['titulo' => 'Keybase' , 'datos' => '{"nombre": "keybase", "icono": "socicon-keybase", "color": "#FF7100"}'],
            ['titulo' => 'Lanyrd' , 'datos' => '{"nombre": "lanyrd", "icono": "socicon-lanyrd", "color": "#3c80c9"}'],
            ['titulo' => 'Lastfm' , 'datos' => '{"nombre": "lastfm", "icono": "socicon-lastfm", "color": "#d41316"}'],
            ['titulo' => 'Line' , 'datos' => '{"nombre": "line", "icono": "socicon-line", "color": "#00B901"}'],
            ['titulo' => 'Linkedin' , 'datos' => '{"nombre": "linkedin", "icono": "socicon-linkedin", "color": "#3371b7"}'],
            ['titulo' => 'Livejournal' , 'datos' => '{"nombre": "livejournal", "icono": "socicon-livejournal", "color": "#0099CC"}'],
            ['titulo' => 'Lyft' , 'datos' => '{"nombre": "lyft", "icono": "socicon-lyft", "color": "#FF00BF"}'],
            ['titulo' => 'Macos' , 'datos' => '{"nombre": "macos", "icono": "socicon-macos", "color": "#000000"}'],
            ['titulo' => 'Mail' , 'datos' => '{"nombre": "mail", "icono": "socicon-mail", "color": "#000000"}'],
            ['titulo' => 'Medium' , 'datos' => '{"nombre": "medium", "icono": "socicon-medium", "color": "#000000"}'],
            ['titulo' => 'Meetup' , 'datos' => '{"nombre": "meetup", "icono": "socicon-meetup", "color": "#e2373c"}'],
            ['titulo' => 'Mixcloud' , 'datos' => '{"nombre": "mixcloud", "icono": "socicon-mixcloud", "color": "#000000"}'],
            ['titulo' => 'Modelmayhem' , 'datos' => '{"nombre": "modelmayhem", "icono": "socicon-modelmayhem", "color": "#000000"}'],
            ['titulo' => 'Mumble' , 'datos' => '{"nombre": "mumble", "icono": "socicon-mumble", "color": "#5AB5D1"}'],
            ['titulo' => 'Myspace' , 'datos' => '{"nombre": "myspace", "icono": "socicon-myspace", "color": "#323232"}'],
            ['titulo' => 'Newsvine' , 'datos' => '{"nombre": "newsvine", "icono": "socicon-newsvine", "color": "#075B2F"}'],
            ['titulo' => 'Nintendo' , 'datos' => '{"nombre": "nintendo", "icono": "socicon-nintendo", "color": "#F58A33"}'],
            ['titulo' => 'Npm' , 'datos' => '{"nombre": "npm", "icono": "socicon-npm", "color": "#C12127"}'],
            ['titulo' => 'Odnoklassniki' , 'datos' => '{"nombre": "odnoklassniki", "icono": "socicon-odnoklassniki", "color": "#f48420"}'],
            ['titulo' => 'Openid' , 'datos' => '{"nombre": "openid", "icono": "socicon-openid", "color": "#f78c40"}'],
            ['titulo' => 'Opera' , 'datos' => '{"nombre": "opera", "icono": "socicon-opera", "color": "#FF1B2D"}'],
            ['titulo' => 'Outlook' , 'datos' => '{"nombre": "outlook", "icono": "socicon-outlook", "color": "#0072C6"}'],
            ['titulo' => 'Overwatch' , 'datos' => '{"nombre": "overwatch", "icono": "socicon-overwatch", "color": "#9E9E9E"}'],
            ['titulo' => 'Patreon' , 'datos' => '{"nombre": "patreon", "icono": "socicon-patreon", "color": "#F96854"}'],
            ['titulo' => 'Paypal' , 'datos' => '{"nombre": "paypal", "icono": "socicon-paypal", "color": "#009cde"}'],
            ['titulo' => 'Periscope' , 'datos' => '{"nombre": "periscope", "icono": "socicon-periscope", "color": "#3AA4C6"}'],
            ['titulo' => 'Persona' , 'datos' => '{"nombre": "persona", "icono": "socicon-persona", "color": "#e6753d"}'],
            ['titulo' => 'Pinterest' , 'datos' => '{"nombre": "pinterest", "icono": "socicon-pinterest", "color": "#c92619"}'],
            ['titulo' => 'Play' , 'datos' => '{"nombre": "play", "icono": "socicon-play", "color": "#000000"}'],
            ['titulo' => 'Player' , 'datos' => '{"nombre": "player", "icono": "socicon-player", "color": "#6E41BD"}'],
            ['titulo' => 'Playstation' , 'datos' => '{"nombre": "playstation", "icono": "socicon-playstation", "color": "#000000"}'],
            ['titulo' => 'Pocket' , 'datos' => '{"nombre": "pocket", "icono": "socicon-pocket", "color": "#ED4055"}'],
            ['titulo' => 'Qq' , 'datos' => '{"nombre": "qq", "icono": "socicon-qq", "color": "#4297d3"}'],
            ['titulo' => 'Quora' , 'datos' => '{"nombre": "quora", "icono": "socicon-quora", "color": "#cb202d"}'],
            ['titulo' => 'Raidcall' , 'datos' => '{"nombre": "raidcall", "icono": "socicon-raidcall", "color": "#073558"}'],
            ['titulo' => 'Ravelry' , 'datos' => '{"nombre": "ravelry", "icono": "socicon-ravelry", "color": "#B6014C"}'],
            ['titulo' => 'Reddit' , 'datos' => '{"nombre": "reddit", "icono": "socicon-reddit", "color": "#e74a1e"}'],
            ['titulo' => 'Renren' , 'datos' => '{"nombre": "renren", "icono": "socicon-renren", "color": "#2266b0"}'],
            ['titulo' => 'Researchgate' , 'datos' => '{"nombre": "researchgate", "icono": "socicon-researchgate", "color": "#00CCBB"}'],
            ['titulo' => 'Residentadvisor' , 'datos' => '{"nombre": "residentadvisor", "icono": "socicon-residentadvisor", "color": "#B3BE1B"}'],
            ['titulo' => 'Reverbnation' , 'datos' => '{"nombre": "reverbnation", "icono": "socicon-reverbnation", "color": "#000000"}'],
            ['titulo' => 'Rss' , 'datos' => '{"nombre": "rss", "icono": "socicon-rss", "color": "#f26109"}'],
            ['titulo' => 'Sharethis' , 'datos' => '{"nombre": "sharethis", "icono": "socicon-sharethis", "color": "#01bf01"}'],
            ['titulo' => 'Skype' , 'datos' => '{"nombre": "skype", "icono": "socicon-skype", "color": "#28abe3"}'],
            ['titulo' => 'Slideshare' , 'datos' => '{"nombre": "slideshare", "icono": "socicon-slideshare", "color": "#4ba3a6"}'],
            ['titulo' => 'Smugmug' , 'datos' => '{"nombre": "smugmug", "icono": "socicon-smugmug", "color": "#ACFD32"}'],
            ['titulo' => 'Snapchat' , 'datos' => '{"nombre": "snapchat", "icono": "socicon-snapchat", "color": "#fffa37"}'],
            ['titulo' => 'Songkick' , 'datos' => '{"nombre": "songkick", "icono": "socicon-songkick", "color": "#F80046"}'],
            ['titulo' => 'Soundcloud' , 'datos' => '{"nombre": "soundcloud", "icono": "socicon-soundcloud", "color": "#fe3801"}'],
            ['titulo' => 'Spotify' , 'datos' => '{"nombre": "spotify", "icono": "socicon-spotify", "color": "#7bb342"}'],
            ['titulo' => 'Stackexchange' , 'datos' => '{"nombre": "stackexchange", "icono": "socicon-stackexchange", "color": "#2f2f2f"}'],
            ['titulo' => 'Stackoverflow' , 'datos' => '{"nombre": "stackoverflow", "icono": "socicon-stackoverflow", "color": "#FD9827"}'],
            ['titulo' => 'Starcraft' , 'datos' => '{"nombre": "starcraft", "icono": "socicon-starcraft", "color": "#002250"}'],
            ['titulo' => 'Stayfriends' , 'datos' => '{"nombre": "stayfriends", "icono": "socicon-stayfriends", "color": "#F08A1C"}'],
            ['titulo' => 'Steam' , 'datos' => '{"nombre": "steam", "icono": "socicon-steam", "color": "#171a21"}'],
            ['titulo' => 'Storehouse' , 'datos' => '{"nombre": "storehouse", "icono": "socicon-storehouse", "color": "#25B0E6"}'],
            ['titulo' => 'Strava' , 'datos' => '{"nombre": "strava", "icono": "socicon-strava", "color": "#FC4C02"}'],
            ['titulo' => 'Streamjar' , 'datos' => '{"nombre": "streamjar", "icono": "socicon-streamjar", "color": "#503a60"}'],
            ['titulo' => 'Stumbleupon' , 'datos' => '{"nombre": "stumbleupon", "icono": "socicon-stumbleupon", "color": "#e64011"}'],
            ['titulo' => 'Swarm' , 'datos' => '{"nombre": "swarm", "icono": "socicon-swarm", "color": "#FC9D3C"}'],
            ['titulo' => 'Teamspeak' , 'datos' => '{"nombre": "teamspeak", "icono": "socicon-teamspeak", "color": "#465674"}'],
            ['titulo' => 'Teamviewer' , 'datos' => '{"nombre": "teamviewer", "icono": "socicon-teamviewer", "color": "#168EF4"}'],
            ['titulo' => 'Technorati' , 'datos' => '{"nombre": "technorati", "icono": "socicon-technorati", "color": "#5cb030"}'],
            ['titulo' => 'Telegram' , 'datos' => '{"nombre": "telegram", "icono": "socicon-telegram", "color": "#0088cc"}'],
            ['titulo' => 'Tripadvisor' , 'datos' => '{"nombre": "tripadvisor", "icono": "socicon-tripadvisor", "color": "#4B7E37"}'],
            ['titulo' => 'Tripit' , 'datos' => '{"nombre": "tripit", "icono": "socicon-tripit", "color": "#1982C3"}'],
            ['titulo' => 'Triplej' , 'datos' => '{"nombre": "triplej", "icono": "socicon-triplej", "color": "#E53531"}'],
            ['titulo' => 'Tumblr' , 'datos' => '{"nombre": "tumblr", "icono": "socicon-tumblr", "color": "#45556c"}'],
            ['titulo' => 'Twitch' , 'datos' => '{"nombre": "twitch", "icono": "socicon-twitch", "color": "#6441a5"}'],
            ['titulo' => 'Twitter' , 'datos' => '{"nombre": "twitter", "icono": "socicon-twitter", "color": "#4da7de"}'],
            ['titulo' => 'Uber' , 'datos' => '{"nombre": "uber", "icono": "socicon-uber", "color": "#000000"}'],
            ['titulo' => 'Ventrilo' , 'datos' => '{"nombre": "ventrilo", "icono": "socicon-ventrilo", "color": "#77808A"}'],
            ['titulo' => 'Viadeo' , 'datos' => '{"nombre": "viadeo", "icono": "socicon-viadeo", "color": "#e4a000"}'],
            ['titulo' => 'Viber' , 'datos' => '{"nombre": "viber", "icono": "socicon-viber", "color": "#7b519d"}'],
            ['titulo' => 'Viewbug' , 'datos' => '{"nombre": "viewbug", "icono": "socicon-viewbug", "color": "#2B9FCF"}'],
            ['titulo' => 'Vimeo' , 'datos' => '{"nombre": "vimeo", "icono": "socicon-vimeo", "color": "#51b5e7"}'],
            ['titulo' => 'Vine' , 'datos' => '{"nombre": "vine", "icono": "socicon-vine", "color": "#00b389"}'],
            ['titulo' => 'Vkontakte' , 'datos' => '{"nombre": "vkontakte", "icono": "socicon-vkontakte", "color": "#5a7fa6"}'],
            ['titulo' => 'Warcraft' , 'datos' => '{"nombre": "warcraft", "icono": "socicon-warcraft", "color": "#1EB10A"}'],
            ['titulo' => 'Wechat' , 'datos' => '{"nombre": "wechat", "icono": "socicon-wechat", "color": "#09b507"}'],
            ['titulo' => 'Weibo' , 'datos' => '{"nombre": "weibo", "icono": "socicon-weibo", "color": "#e31c34"}'],
            ['titulo' => 'Whatsapp' , 'datos' => '{"nombre": "whatsapp", "icono": "socicon-whatsapp", "color": "#20B038"}'],
            ['titulo' => 'Wikipedia' , 'datos' => '{"nombre": "wikipedia", "icono": "socicon-wikipedia", "color": "#000000"}'],
            ['titulo' => 'Windows' , 'datos' => '{"nombre": "windows", "icono": "socicon-windows", "color": "#00BDF6"}'],
            ['titulo' => 'Wordpress' , 'datos' => '{"nombre": "wordpress", "icono": "socicon-wordpress", "color": "#464646"}'],
            ['titulo' => 'Wykop' , 'datos' => '{"nombre": "wykop", "icono": "socicon-wykop", "color": "#328efe"}'],
            ['titulo' => 'Xbox' , 'datos' => '{"nombre": "xbox", "icono": "socicon-xbox", "color": "#92C83E"}'],
            ['titulo' => 'Xing' , 'datos' => '{"nombre": "xing", "icono": "socicon-xing", "color": "#005a60"}'],
            ['titulo' => 'Yahoo' , 'datos' => '{"nombre": "yahoo", "icono": "socicon-yahoo", "color": "#6e2a85"}'],
            ['titulo' => 'Yammer' , 'datos' => '{"nombre": "yammer", "icono": "socicon-yammer", "color": "#1175C4"}'],
            ['titulo' => 'Yandex' , 'datos' => '{"nombre": "yandex", "icono": "socicon-yandex", "color": "#FF0000"}'],
            ['titulo' => 'Yelp' , 'datos' => '{"nombre": "yelp", "icono": "socicon-yelp", "color": "#c83218"}'],
            ['titulo' => 'Younow' , 'datos' => '{"nombre": "younow", "icono": "socicon-younow", "color": "#61C03E"}'],
            ['titulo' => 'Youtube' , 'datos' => '{"nombre": "youtube", "icono": "socicon-youtube", "color": "#e02a20"}'],
            ['titulo' => 'zapier' , 'datos' => '{"nombre": "zapier", "icono": "socicon-zapier", "color": "#FF4A00"}'],
            ['titulo' => 'zerply' , 'datos' => '{"nombre": "zerply", "icono": "socicon-zerply", "color": "#9DBC7A"}'],
            ['titulo' => 'zomato' , 'datos' => '{"nombre": "zomato", "icono": "socicon-zomato", "color": "#cb202d"}'],
            ['titulo' => 'zynga' , 'datos' => '{"nombre": "zynga", "icono": "socicon-zynga", "color": "#DC0606"}'],
            ['titulo' => 'Spreadshirt' , 'datos' => '{"nombre": "spreadshirt", "icono": "socicon-spreadshirt", "color": "#00b2a6"}'],
            ['titulo' => 'Trello' , 'datos' => '{"nombre": "trello", "icono": "socicon-trello", "color": "#0079bf"}'],
            ['titulo' => 'Gamejolt' , 'datos' => '{"nombre": "gamejolt", "icono": "socicon-gamejolt", "color": "#191919"}'],
            ['titulo' => 'Tunein' , 'datos' => '{"nombre": "tunein", "icono": "socicon-tunein", "color": "#36b4a7"}'],
            ['titulo' => 'Bloglovin' , 'datos' => '{"nombre": "bloglovin", "icono": "socicon-bloglovin", "color": "#000000"}'],
            ['titulo' => 'Gamewisp' , 'datos' => '{"nombre": "gamewisp", "icono": "socicon-gamewisp", "color": "#F8A853"}'],
            ['titulo' => 'Messenger' , 'datos' => '{"nombre": "messenger", "icono": "socicon-messenger", "color": "#0084ff"}'],
            ['titulo' => 'Pandora' , 'datos' => '{"nombre": "pandora", "icono": "socicon-pandora", "color": "#224099"}'],
            ['titulo' => 'Microsoft' , 'datos' => '{"nombre": "microsoft", "icono": "socicon-microsoft", "color": "#666666"}'],
            ['titulo' => 'Mobcrush' , 'datos' => '{"nombre": "mobcrush", "icono": "socicon-mobcrush", "color": "#FFEE00"}'],
            ['titulo' => 'Sketchfab' , 'datos' => '{"nombre": "sketchfab", "icono": "socicon-sketchfab", "color": "#00A5D6"}'],
            ['titulo' => 'Yt-gaming' , 'datos' => '{"icono":"nombre": "gaming"  "socicon-yt-gaming", "color": "#E91D00"}'],
            ['titulo' => 'Fyuse' , 'datos' => '{"nombre": "fyuse", "icono": "socicon-fyuse", "color": "#FF3143"}'],
            ['titulo' => 'Bitbucket' , 'datos' => '{"nombre": "bitbucket", "icono": "socicon-bitbucket", "color": "#243759"}'],
            ['titulo' => 'Augment' , 'datos' => '{"nombre": "augment", "icono": "socicon-augment", "color": "#E71204"}'],
            ['titulo' => 'Toneden' , 'datos' => '{"nombre": "toneden", "icono": "socicon-toneden", "color": "#777BF9"}'],
            ['titulo' => 'Niconico' , 'datos' => '{"nombre": "niconico", "icono": "socicon-niconico", "color": "#000000"}'],
            ['titulo' => 'zillow' , 'datos' => '{"nombre": "zillow", "icono": "socicon-zillow", "color": "#0074e4"}'],
            ['titulo' => 'Googlemaps' , 'datos' => '{"nombre": "googlemaps", "icono": "socicon-googlemaps", "color": "#4285F4"}'],
            ['titulo' => 'Booking' , 'datos' => '{"nombre": "booking", "icono": "socicon-booking", "color": "#003580"}'],
            ['titulo' => 'Fundable' , 'datos' => '{"nombre": "fundable", "icono": "socicon-fundable", "color": "#1d181f"}'],
            ['titulo' => 'Upwork' , 'datos' => '{"nombre": "upwork", "icono": "socicon-upwork", "color": "#5BBC2F"}'],
            ['titulo' => 'Ghost' , 'datos' => '{"nombre": "ghost", "icono": "socicon-ghost", "color": "#33393C"}'],
            ['titulo' => 'Loomly' , 'datos' => '{"nombre": "loomly", "icono": "socicon-loomly", "color": "#00425f"}'],
            ['titulo' => 'Trulia' , 'datos' => '{"nombre": "trulia", "icono": "socicon-trulia", "color": "#20BF63"}'],
            ['titulo' => 'Ask' , 'datos' => '{"nombre": "ask", "icono": "socicon-ask", "color": "#CF0000"}'],
            ['titulo' => 'Gust' , 'datos' => '{"nombre": "gust", "icono": "socicon-gust", "color": "#1E2E3E"}'],
            ['titulo' => 'Toptal' , 'datos' => '{"nombre": "toptal", "icono": "socicon-toptal", "color": "#4C73AA"}'],
            ['titulo' => 'Squarespace' , 'datos' => '{"nombre": "squarespace", "icono": "socicon-squarespace", "color": "#121212"}'],
            ['titulo' => 'Bonanza' , 'datos' => '{"nombre": "bonanza", "icono": "socicon-bonanza", "color": "#62764A"}'],
            ['titulo' => 'Doodle' , 'datos' => '{"nombre": "doodle", "icono": "socicon-doodle", "color": "#0064DC"}'],
            ['titulo' => 'Bing' , 'datos' => '{"nombre": "bing", "icono": "socicon-bing", "color": "#008485"}'],
            ['titulo' => 'Seedrs' , 'datos' => '{"nombre": "seedrs", "icono": "socicon-seedrs", "color": "#7FBB31"}'],
            ['titulo' => 'Freelancer' , 'datos' => '{"nombre": "freelancer", "icono": "socicon-freelancer", "color": "#0088CA"}'],
            ['titulo' => 'Shopify' , 'datos' => '{"nombre": "shopify", "icono": "socicon-shopify", "color": "#5C6AC4"}'],
            ['titulo' => 'Googlecalendar' , 'datos' => '{"nombre": "googlecalendar", "icono": "socicon-googlecalendar", "color": "#3D81F6"}'],
            ['titulo' => 'Redfin' , 'datos' => '{"nombre": "redfin", "icono": "socicon-redfin", "color": "#C82022"}'],
            ['titulo' => 'Wix' , 'datos' => '{"nombre": "wix", "icono": "socicon-wix", "color": "#0096FF"}'],
            ['titulo' => 'Craigslist' , 'datos' => '{"nombre": "craigslist", "icono": "socicon-craigslist", "color": "#561A8B"}'],
            ['titulo' => 'Alibaba' , 'datos' => '{"nombre": "alibaba", "icono": "socicon-alibaba", "color": "#FF6A00"}'],
            ['titulo' => 'zoom' , 'datos' => '{"nombre": "zoom", "icono": "socicon-zoom", "color": "#2D8CFF"}'],
            ['titulo' => 'Homes' , 'datos' => '{"nombre": "homes", "icono": "socicon-homes", "color": "#F7841B"}'],
            ['titulo' => 'Appstore' , 'datos' => '{"nombre": "appstore", "icono": "socicon-appstore", "color": "#007AFF"}'],
            ['titulo' => 'Guru' , 'datos' => '{"nombre": "guru", "icono": "socicon-guru", "color": "#4C81C0"}'],
            ['titulo' => 'Aliexpress' , 'datos' => '{"nombre": "aliexpress", "icono": "socicon-aliexpress", "color": "#E92C00"}'],
            ['titulo' => 'Gotomeeting' , 'datos' => '{"nombre": "gotomeeting", "icono": "socicon-gotomeeting", "color": "#FD7A2B"}'],
            ['titulo' => 'Fiverr' , 'datos' => '{"nombre": "fiverr", "icono": "socicon-fiverr", "color": "#0DB62A"}'],
            ['titulo' => 'Logmein' , 'datos' => '{"nombre": "logmein", "icono": "socicon-logmein", "color": "#45B6F3"}'],
            ['titulo' => 'Openaigym' , 'datos' => '{"nombre": "openaigym", "icono": "socicon-openaigym", "color": "#29A8B3"}'],
            ['titulo' => 'Slack' , 'datos' => '{"nombre": "slack", "icono": "socicon-slack", "color": "#4B6BC6"}'],
            ['titulo' => 'Codepen' , 'datos' => '{"nombre": "codepen", "icono": "socicon-codepen", "color": "#000000"}'],
            ['titulo' => 'Angieslist' , 'datos' => '{"nombre": "angieslist", "icono": "socicon-angieslist", "color": "#299F37"}'],
            ['titulo' => 'Homeadvisor' , 'datos' => '{"nombre": "homeadvisor", "icono": "socicon-homeadvisor", "color": "#EF8B1D"}'],
            ['titulo' => 'Unsplash' , 'datos' => '{"nombre": "unsplash", "icono": "socicon-unsplash", "color": "#000000"}'],
            ['titulo' => 'Mastodon' , 'datos' => '{"nombre": "mastodon", "icono": "socicon-mastodon", "color": "#2986D6"}'],
            ['titulo' => 'Natgeo' , 'datos' => '{"nombre": "natgeo", "icono": "socicon-natgeo", "color": "#222222"}'],
            ['titulo' => 'Qobuz' , 'datos' => '{"nombre": "qobuz", "icono": "socicon-qobuz", "color": "#298FBF"}'],
            ['titulo' => 'Tidal' , 'datos' => '{"nombre": "tidal", "icono": "socicon-tidal", "color": "#01FFFF"}'],
            ['titulo' => 'Realtor' , 'datos' => '{"nombre": "realtor", "icono": "socicon-realtor", "color": "#D52228"}'],
            ['titulo' => 'Calendly' , 'datos' => '{"nombre": "calendly", "icono": "socicon-calendly", "color": "#00a3fa"}'],
            ['titulo' => 'Homify' , 'datos' => '{"nombre": "homify", "icono": "socicon-homify", "color": "#7DCDA3"}'],
            ['titulo' => 'Crunchbase' , 'datos' => '{"nombre": "crunchbase", "icono": "socicon-crunchbase", "color": "#0288d1"}'],
            ['titulo' => 'Livemaster' , 'datos' => '{"nombre": "livemaster", "icono": "socicon-livemaster", "color": "#e76d00"}'],
            ['titulo' => 'Udemy' , 'datos' => '{"nombre": "udemy", "icono": "socicon-udemy", "color": "#17aa1c"}'],
            ['titulo' => 'Nextdoor' , 'datos' => '{"nombre": "nextdoor", "icono": "socicon-nextdoor", "color": "#01B247"}'],
            ['titulo' => 'Origin' , 'datos' => '{"nombre": "origin", "icono": "socicon-origin", "color": "#F56C2E"}'],
            ['titulo' => 'Codered' , 'datos' => '{"nombre": "codered", "icono": "socicon-codered", "color": "#FF033B"}'],
            ['titulo' => 'Portfolio' , 'datos' => '{"nombre": "portfolio", "icono": "socicon-portfolio", "color": "#54AFFF"}'],
            ['titulo' => 'Instructables' , 'datos' => '{"nombre": "instructables", "icono": "socicon-instructables", "color": "#f8b514"}'],
            ['titulo' => 'Gitlab' , 'datos' => '{"nombre": "gitlab", "icono": "socicon-gitlab", "color": "#e65228"}'],
            ['titulo' => 'Mailru' , 'datos' => '{"nombre": "mailru", "icono": "socicon-mailru", "color": "#FDA840"}'],
            ['titulo' => 'Bookbub' , 'datos' => '{"nombre": "bookbub", "icono": "socicon-bookbub", "color": "#E70005"}'],
            ['titulo' => 'Kobo' , 'datos' => '{"nombre": "kobo", "icono": "socicon-kobo", "color": "#BF0000"}'],
            ['titulo' => 'Smashwords' , 'datos' => '{"nombre": "smashwords", "icono": "socicon-smashwords", "color": "#4181C3"}'],
            ['titulo' => 'Hackernews' , 'datos' => '{"nombre": "hackernews", "icono": "socicon-hackernews", "color": "#FF6601"}']
        ]);
    }
}