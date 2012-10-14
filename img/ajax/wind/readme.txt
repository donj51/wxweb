Place your modified wind rose icons in folder [3].

Then edit ajaxWDwx-settings.js and change values in:

wrImg =
   {src   : imgDir+"wind/3/wr-#LANG##DIR#.gif"  // where #DIR# will = wind dir (e.g. NNW), #LANG# = wrImg.lang
   ,width : 58 ,height: 58 ,hspace: 0 ,vspace: 0 ,border: 0
   ,style : ""
   ,align : "" // [ left | right | top | bottom | middle | texttop | absbottom | absmiddle ]
   ,useTag: "ajaxwindiconwr" // ajax tagname to use where the windrose icon should be placed
   ,lang  : ""     // with trailing dash (e.g. "nl-" will result in graphic name: "./ajax-images/wr-nl-SSE.gif")
   ,calm  : "calm" // substitution for #DIR# (e.g "wr-calm.gif") ... specify "" if not to be shown or not available
   };
   