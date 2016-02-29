 #!/bin/bash
$FILE = '/var/www/zielkede/app/webroot/uploaded/default.aspx.png';
 #mv -f $FILE /var/www/zielkede/app/webroot/uploaded/default.aspx.png;
curl --form userfile=@$FILE 'https://rs-test.cms.hu-berlin.de/cmsproject2/plugins/api_upload/?key=QMIMLmWNBjiAEIK3N4V6JS9dbkAz1C6vjN5gTdtouHw5HIzgpQ-kI99y_N-NCA6MPhFluWCzA8JZv5a_Qzz2Jw,,';

#curl --form userfile=@/var/www/zielkede/app/webroot/uploaded/default.aspx.png 'https://rs-test.cms.hu-berlin.de/cmsproject2/plugins/api_upload/?key=QMIMLmWNBjiAEIK3N4V6JS9dbkAz1C6vjN5gTdtouHw5HIzgpQ-kI99y_N-NCA6MPhFluWCzA8JZv5a_Qzz2Jw,,';
#mv -f $FILE /var/www/zielkede/app/webroot/uploaded/default.aspx.png;
 