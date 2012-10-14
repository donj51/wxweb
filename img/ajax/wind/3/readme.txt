Place your modified wind rose icons in folder [3].

Then edit ajaxWDwx.js and change values in:

var wrImg =
   {src   : imgDir+"wind/3/wr-#LANG##DIR#.gif"  // where #DIR# = wind dir (e.g. NNW), #LANG# = wrImg.lang
   ,lang  : ""     // with trailing dash (e.g. "nl-" will result in graphic name: "./ajax-images/wind/wr-nl-SSE.gif")
   ,calm  : "calm" // substitution for #DIR# (e.g "wr-calm.gif") ... specify "" if not to be shown or not available
   ,width : 80 ,height: 80 ,hspace: 0 ,vspace: 0 ,border: 0
   ,style : ""
   ,align : "" // [ left | right | top | bottom | middle | texttop | absbottom | absmiddle ]
   };



   