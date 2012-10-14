Place your modified FWI icons in folder [B].

Then edit ajaxWDwx-settings.js and change values in:

fireImg =
   {src   : imgDir+"fire/B/fire#INDEX#.jpg" // where #INDEX# will = fire index (0=very low, 1=low, 2=moderate, 3=high, 4=extreme) from clientraw
   ,width : 100 ,height: 65 ,hspace: 0 ,vspace: 0 ,border: 0
   ,style : "border: 2px solid silver;"
   ,align : ""
   ,useTag: "ajaxfireimg"
   };
