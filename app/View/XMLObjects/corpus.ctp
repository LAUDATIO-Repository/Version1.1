<?php
echo $this->Html->script('uploadscript',array('inline' => false));
echo $this->Html->script('view',array('inline' => false));
echo $this->Html->script('jquery.treeTableGeneric.js',array('inline' => false));
echo $this->Html->css('/js/css/jquery.treeTable.css', null, array('inline' => false));
echo $this->Html->css('view');

echo '<a id="close1" href="#" class="close-section">Close Section</a>';
echo '<a id="close2" href="#" class="close-section">Close Section</a>';
echo '<a id="close3" href="#" class="close-section">Close Section</a>';
echo '<a id="close4" href="#" class="close-section">Close Section</a>';
$pids = preg_split('/:/', $pid);

$this->set('navbarArray',array(array('Browse','view'),array($pids[1])));

#echo "master to stage";
#echo "check";

if(isset($noTEI) && $noTei ==true) {
    echo 'No TEI-Header available.';
}
else {
    $ann_link ='https://korpling.german.hu-berlin.de/annis3/#c='.$pid.'';
    echo "<div style=\"float:right;text-align:right;\">";

    #if(preg_match("/^[A-Z]/",$download_format[$x])) {

    if (in_array("relANNIS",$download_format)) {
        echo $this->Html->image("annis_192.png",array(
            'width'=>'60px',
            "border" => "0",
            "alt" => "Link to ANNIS",
            "url" => $ann_link,
            "fullBase" => true
        ));
    }
    echo "</div></br>";


    echo '<h3>'.$title.'</h3>';

    echo '<tr><td>';
    if ($extent !="" && $extent !="N/A"&& $extent !="?") {
        echo $extent.' '.$extent["type"]."<br><br>";
    }
    echo '</td></tr>';

    echo "<select id='versionDate' onchange='changeVersion(\"".urlencode($pid)."\")' name='dateObject'>";

    foreach($versions as $i => $vers) {
        $displayName =  substr($vers,strrpos($vers,'_')+1);
        $displayName =  substr($displayName,0,strrpos($displayName,':'));
        $displayName =  preg_replace("/T/"," ",$displayName);
        $displayName = date( "Y-m-d H:i:s", strtotime($displayName)+1*60*60);

        if ($vers == $thisVersion) {
            echo "<option value='".$vers."' selected>$displayName</option>";
        }
        else {
            echo "<option value='".$vers."'>$displayName</option>";
        }
    }
    echo "</select>";

    if($preview) {
        echo '<div id="preview" ref="true"></div>';
    }
    else {
        echo '<div id="preview" ref="false"></div>';
    }
    $url = Router::url(array('controller'=>'XMLObjects','action'=>'corpus_load',$pid,$thisVersion),true);
    echo '<table id="tree" data-url="'.$url.'" rel="'.$pid.'" ref="'.$thisVersion.'">';
    #echo '<tr><td>'.$title.', '.$authority.', '.count($date_array).".0".'';

    #echo '<tr><td>';
    #echo '<tr><td>'.$title.', '.$authority.'';
    //ehemals $version
    /*
        if ($extent !="" && $extent !="N/A"&& $extent !="?"){
            echo $extent.' '.$extent["type"];
            #echo ', '.$extent.' '.$extent["type"];
        }
    */
    #echo ', '.end($date_array);

    if ($license['cc_js_result_name'] =="No license chosen") {
        echo "<div style=\"float:right;text-align:right;clear:both;margin-top:-18px\">";
        echo "No License specified";
        echo "</div>";
    }
    else if($license) {
        echo "<div style=\"float:right;text-align:right;clear:both;margin-top:-18px\">";
        echo "Licence (for corpus and related documents): ".$this->Html->image($license['cc_js_result_img'],array(
                //'width'=>'40px',
                "border" => "0",
                'title' => $license['cc_js_result_name'],
                "alt" => $license['cc_js_result_name'],
                "url" => $license['cc_js_result_uri'],
                "fullBase" => true
            ));
        echo "</div>";
    }


    if ($download_format != NULL) {
        echo '<tr><td>';
        $total_download_format = (int)count($download_format);
        echo "<b>Formats: </b> ";

        foreach($versions as $i => $vers) {
            if ($vers == $thisVersion) {
                $disName =  substr($vers,strrpos($vers,'_')+1);
                $versHit = preg_replace("/_$disName/","",$vers);

                echo $this->Html->link("TEI-Header", $_SERVER['../DOCUMENT_ROOT']."/downloadDatastream/".$pid."/".$versHit."");
                echo ", ";
            }
        }

        for($x=0;$x<$total_download_format;) {
            if(preg_match("/^[A-Z]/",$download_format[$x])) {
                #$download = strtoupper($download_format[$x]);//"http://141.20.4.72/fedora/get/".$pid."/".strtoupper($download_format[$x])."";
                #print_r($download);
                $download = $download_format[$x];
            }
            else {
                $download = $download_format[$x];//"http://141.20.4.72/fedora/get/".$pid."/".$download_format[$x]."";
            }
            if ($x!=0) {
                echo ", ";
            }

            #if ($download_format[$x] == 'TEI-Header') {
            #$teiheader_download = "http://141.20.4.72:8080/fedora/get/".$pid."/".$download_format[$x]."";
            #$teiheader_download = "http://141.20.4.72:8080/fedora/objects/".$pid."/datastreams/TEI-Header";
            #echo $teiheader_download;
            #}

            ###if ($download == "PDF") {
                #echo $this->Html->link($download, "http://www.laudatio-repository.org/repository/tmp/".$download_format[$x].".zip");
                ###echo $this->Html->link($download, "http://www.laudatio-repository.org/repository/".$download_format[$x].".zip");
            ###}
            ###else {
                echo $this->Html->link($download_format[$x], array('controller' => 'XMLObjects','action' => 'downloadDatastream',$pid,$download));
            ###}
            $x++;
        }
        echo '</td></tr>';
    }
    echo '</td></tr>';

    #natcasesort($editor_surname_array);
    $editor_key_array =array();
    $editor_key_array = array_keys($editor_surname_array);

    if (isset($handlePID)) {
        echo '<tr><td>';
        echo '<div id="quotation">Always quote when using this data!</div>';
        $handle = 'http://hdl.handle.net/11022/'.$handlePID;
        $date_exact[0] = preg_split('/-/', end($date_array));

        if (isset($editor_surname_array)) {
            foreach ($editor_key_array as $editor_key_value) {
                echo $editor_surname_array[$editor_key_value].", ".$editor_forename_array[$editor_key_value];
                echo '; ';
            }
        }

        #$corp_version = end($date_array);
        #$lastChr = substr($corp_version, -4);
        //testtesttest
        #var_dump($date_exact[0][0]);

        //ehemals $version
        #echo $pids[1]." (".$date_exact[0][0].") Version: ".count($date_array).".0".". ".$authority.". ".$homepage.".<br>".$this->Html->link($handle, $handle);
        #echo $pids[1]." (".$date_exact[0][0]."), Version: ".$lastChr." ".$authority.". ".$homepage.".<br>".$this->Html->link($handle, $handle);

        //var_dump($date_array[0]);
        //$date_exact[0] ? $date_exact[0][0] : $date_exact[0][0] = $date_array;

        if ($date_exact[0][0] =="") {
            $date_exact[0][0] = $date_array[0];
        }

        echo $pids[1]." (Version ".$date_exact[0][0]."), ".$authority.". ".$homepage.".<br>".$this->Html->link($handle, $handle);

        #echo "<b>Persistent Identifier: </b> ".$this->Html->link($handle, $handle);
        echo '</td></tr>';
    }

    //CORPUS
    echo '<tr id="ex2-node-1" class="load parent"><td><b title="Contains metadata for the object &lsquo;corpus&rsquo;">Corpus '.$title.'</b>';
    #&lsquo;corpus&rsquo;
    echo '<span class="helptooltip"><p>The section contains general information about the corpus itself. You get information about the corpus editors and annotators, the corpus project, the documents of the corpus and the applied annotations and formats.</p>';
    echo $this->Html->image("help.png",array(
        "border" => "0",
        'width'=>'20px',
        "alt" => "help",
    ));
    echo '</span></td></tr>';


    //DOCUMENTS
    $url = Router::url(array('controller'=>'Views','action'=>'objects_schema6_documents',$pid,$thisVersion),true);
    echo '<tr id="ex2-node-2" class="load parent" data-url="'.$url.'"><td><b title="Contains classical metadata for the object &lsquo;document&rsquo;">Documents</b>';
    echo '<span class="helptooltip"><p>The section contains bibliographic information about each document in the corpus, e.g. author, date and publication place. Each document has a list of annotation.</p>';
    echo $this->Html->image("help.png",array(
        "border" => "0",
        'width'=>'20px',
        "alt" => "help",
    ));
    echo '</span></td></tr>';


    //ANNOTATION
    echo '<tr id="ex2-node-3" class="load parent"><td><b title="Contains information about the applied annotations of the corpus">Annotation</b>';
    echo '<span class="helptooltip"><p>The section contains the whole tagset for each annotation with descriptions.</p>';
    echo $this->Html->image("help.png",array(
        "border" => "0",
        'width'=>'20px',
        "alt" => "help",
    ));
    echo '</span></td></tr>';

    //PREPARATION
    $url = Router::url(array('controller'=>'Views','action'=>'objects_schema6_preparation',$pid,$thisVersion),true);
    echo '<tr id="ex2-node-4" class="load parent" data-url="'.$url.'"><td><b title="Contains information about every preparation step of every applied annotation">PreparationStep</b>';
    echo '<span class="helptooltip"><p>The section contains information about each step of preparation for each annotation which is listed in the section &lsquo;annotation&rsquo;. Here, the tools used for data preparation, checking methods and information about the overall corpus architecture are listed.</p>';
    echo $this->Html->image("help.png",array(
        "border" => "0",
        'width'=>'20px',
        "alt" => "help",
    ));
    echo '</span></td></tr>';

    echo '</table>';
}

if (isset($reveal)) {
    echo '<script language="javascript" type="text/javascript"> reveal = "'.$reveal.'"';
    if(isset($reveal_number)){
        echo '; reveal_number = "'.$reveal_number.'"';
    }
    echo '</script>';
}
?>