Place your modified icons in folder [3].

Then edit ajaxWDwx-settings.js and change values in:

wxIconSet =
   {src    : imgDir+"icon/3/#PIC#.jpg" // where #PIC# will = picname from function specified in wxIconSet.useName below
   ,width  : 55 ,height: 58 ,hspace: 0 ,vspace: 0 ,border: 0
   ,style  : ""  // eg. "border: 2px solid silver"
   ,align  : ""  // [ left | right | top | bottom | middle | texttop | absbottom | absmiddle ]
   ,useTag : "ajaxconditionicon2" // [ ajaxconditionicon | ajaxconditionicon2 ] ... ajax tagname to use
   ,useName: 1   // [ 0| 1 | 2 | 9 ] function for getting icon names ...
   };            //                  0 = Anole's icon names ............ see ajax_getIconName0()
                 //                  1 = NWS icon names ................ see ajax_getIconName1()
                 //                  2 = Bashewa numbered icon names ... see ajax_getIconName2()
                 //                  9 = Dynamic current icons ......... NOT IMPLEMENTED
