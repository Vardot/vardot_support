window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?5UCjPMeHmIhwxMtN2lH8y2OrQlNRT4Pv";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");

// Set the default Zendesk User/client.
$zopim(function() {
  $zopim.livechat.setName(drupalSettings.vardotSubscription.username);
  $zopim.livechat.setEmail(drupalSettings.vardotSubscription.email);
  $zopim.livechat.addTags('live-chat');
});


