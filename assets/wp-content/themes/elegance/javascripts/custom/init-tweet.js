jQuery(document).ready(function($) {
    //TWITTER INIT (Updated with compatibility on Twitter's new API):
   //PLEASE READ DOCUMENTATION FOR INFO ABOUT SETTING UP YOUR OWN TWITTER CREDENTIALS:
    $(function ($) {
        $('.tweets-ticker').tweet({
            modpath: tweetobj.path + '/twitter/',
            count: 1,
            loading_text: 'loading twitter feed',
            username: tweetobj.twitter_id
            /* etc... */
        });
    });
});

