<?php
    $this->set('navbarArray',array(array('Modify','modify'),array('Modify Object','modifyObject')));
    echo $this->Html->script('uploadscript',array('inline' => false));
    echo $this->Html->css('jquery-ui.min.css', null, array('inline' => false));
    echo $this->Html->script('jquery-ui.min.js',array('inline' => false));
    echo $this->Html->script('modify',array('inline' => false));

    echo $this->Html->script('corpus',array('inline' => false));

    echo $this->Html->css('creativecommons',null,array('inline' => false));

    if(isset($ingestedObject)){
        echo $this->html->link('View modified Corpus',array('controller' => 'XMLObjects', 'action' => 'corpus/'.$ingestedObject));
        echo '</br>';
        echo '<p></p>';
        echo '</br>';
    }

    if(!isset($label)){
        $label = '';
    }
    if(!isset($id)){
        $id = '';
    }
    if(!isset($owner)){
        $owner = '';
    }
    if(!isset($state)){
        $state = '';
    }
    if(!isset($response)){
        $response = '';
    }
    if(!isset($datastreams)){
        $datastreams = '';
    }

    if(!isset($license)){
        $license = '';
    }
?>

<form  method="POST" enctype="multipart/form-data">
<h3>Properties</h3>
<table border="0" cellpadding="0" cellspacing="4">
    <?php
        echo '<tr><td title="Corpus Name">Corpus Name:<span class="helptooltip"><p>ID:CorpusName Usually an acronym with an own ID, e.g. laudatio:RIDGES-Herbology. The ID cannot be changed.</p>';
            echo $this->Html->image("help.png",array(
                'border' => '0',
                'width'=>'20px',
                'alt' => 'help',
            ));
        echo '</span></td>';
        echo "<td id='corpusID'>$id</td></tr>";
    ?>

    <?php
        echo '<tr><td title="Corpus Label">Data stream Label:<span class="helptooltip"><p>CorpusLabel Usually the full name of the corpus or corpus project, e.g. Register in German Science. If you´re not satisfied with the current label, you can change it.</p>';
            echo $this->Html->image("help.png",array(
                'border' => '0',
                'width'=>'20px',
                'alt' => 'help',
            ));
        echo '</span></td>';
	    echo "<td><input name='label' type='text' value='$label' size='32' maxlength='64'></td></tr>";
    ?>

    <?php
        echo '<tr><td title="Owner">Owner:<span class="helptooltip"><p>You can chose other accounts to get the same status as corpus administrator for the current corpus.</p>';
            echo $this->Html->image("help.png",array(
                'border' => '0',
                'width'=>'20px',
                'alt' => 'help',
            ));
        echo '</span></td>';
	    echo "<td><input name='owner' type='text' value='$owner' size='32' maxlength='64'></td></tr>";
    ?>

    <?php
        echo '<tr><td title="State">State:<span class="helptooltip"><p>Shows the state of the corpus in Laudatios database.</p>';
            echo $this->Html->image("help.png",array(
                'border' => '0',
                'width'=>'20px',
                'alt' => 'help',
            ));
        echo '</span></td>';
    ?>

	<td>
	<select name="state" size="1" enabled>
	<option value="A" <?php if($state=='A') echo 'selected';?>>Active (A)</option>
	<option value="I"<?php if($state=='I') echo 'selected';?>>Inactive (I)</option>
	<option value="D"<?php if($state=='D') echo 'selected';?>>Deleted (D)</option>
	</select>
	</td>
</tr>
</table>
    <table border="0" cellpadding="0" cellspacing="4">
    <?php
       if(isset($license['cc_js_result_uri']) && $license['cc_js_result_name'] != "No license chosen") {
            echo '<tr><th>Your corpus was uploaded using a Creative Commons Licence:</th></tr>';
            echo '<tr><td id="creativecommonsField">';
            echo '<input type="hidden" id="cc_js_seed_uri" value='.$license['cc_js_result_uri'].' />';
            echo '<script type="text/javascript" src="http://api.creativecommons.org/jswidget/tags/0.97/complete.js?locale=en_US&amp;jurisdictions=disabled"></script>';
            echo '</td></tr>';
        }

        if (!isset($license['cc_js_result_name']) || $license['cc_js_result_name'] == "No license chosen") {
            echo '<tr><th>Your corpus was uploaded without using a Creative Commons Licence. Please use a Creative Commons Licence:</th></tr>';
            echo '<tr><td id="creativecommonsField">';
            echo '<input type="hidden" id="cc_js_seed_uri" value="http://creativecommons.org/licenses/by-sa/3.0/de/" />';
            echo '<script type="text/javascript" src="http://api.creativecommons.org/jswidget/tags/0.97/complete.js?locale=en_US&amp;jurisdictions=disabled"></script>';
            echo '</td></tr>';
        }
    ?>
</table>

<!--
</br>
<input type="submit" value="Save Changes">
</form>

</br>
-->

<h3>Data streams</h3>
<table id="uploadform">
<tr><th>Data stream-ID</th><th>Label</th><th>mimeType</th></tr>
<?php
    foreach($datastreams as $ds) {
        if($ds['dsid'] == 'DC' || $ds['dsid'] == 'teiVersion' || $ds['dsid'] == 'license' || $ds['dsid'] == 'handlePIDs') continue;
        echo '<tr><td>'.$ds['dsid'].'</td>';
        echo '<td>'.$ds['label'].'</td>';
        echo '<td>'.$ds['mimeType'].'</td>';

        echo '<td><button type="button" onclick="window.location.href=\'../modifyDatastream/'.urlencode(trim($id)).'/'.urlencode(trim($ds['dsid'])).'\'">Modify</button></td>';
        echo '<td><button type="button" onclick="window.location.href=\'../downloadDatastream/'.urlencode(trim($id)).'/'.urlencode(trim($ds['dsid'])).'\'">Download</button></td>';
        if(strpos($ds['dsid'],"TEI-header") ===0 ){
            echo '<td><button type="button" onclick="window.location.href=\'../uploadNewTeiVersion/'.urlencode(trim($id)).'/'.urlencode(trim($ds['dsid'])).'\'">Upload new Version</button></td>';
        }else{
            echo '<td><button type="button" onclick="window.location.href=\'../uploadNewVersion/'.urlencode(trim($id)).'/'.urlencode(trim($ds['dsid'])).'\'">Upload new Version</button></td>';
        }
        echo '<td><button type="button" onclick="window.location.href=\'../dsVersionHistory/'.urlencode(trim($id)).'/'.urlencode(trim($ds['dsid'])).'\'">History</button></td>';
        echo '<td><button type="button" onclick="return confirmDelete(\''.$ds['dsid'].'\',\''.urlencode(trim($id)).'\')">Delete</button></td>';
        echo '</tr>';
    }
?>
<tr>
	 <?php
        echo '<td title="Data streams"><button type="button" onclick="window.location.href=\'../addDatastream/'.urlencode(trim($id)).'\'">Add New Datastreams</button>';
     /*
        echo '<span class="helptooltip"><p>Upload/modify/download a zipped file for each format of the corpus and give the file a display name, e.g. upload exb-files and names them &lsquo;EXMARaLDA&rsquo;. <br><br>The display name must be exactly the same name as the given name under application ident in TEI-Header Scheme.</p>';
        echo $this->Html->image("help.png",array(
             'border' => '0',
             'width'=>'20px',
             'alt' => 'help',
        ));
     */
        echo '</span></td>';

        echo '<td title="Data streams (Metadata)"><button type="button" onclick="window.location.href=\'../addTeiheader/'.urlencode(trim($id)).'\'">Add New TEI-header</button>';
     /*
        echo '<span class="helptooltip"><p>Upload/modify/download the merged TEI XML file for your corpus.</p>';
        echo $this->Html->image("help.png",array(
             'border' => '0',
             'width'=>'20px',
             'alt' => 'help',
        ));
     */
        echo '</span></td>';
     ?>
</tr>
</table>
<br>
<?php
echo $this->Html->image("delete.ico",array(
    "border" => "0",
    'id' => 'deleteIcon',
    'width'=>'15px',
    'class' => 'clickable hidden',
    'style'=>'float:right; margin-left:10px;',
    'title' => 'remove user',
    "alt" => "remove"
));
?>
<h3>Users</h3>
<table>
    <tr><th>Creator Account:</th></tr><tr><td><?php echo $creator ?></td></tr>
    <?php
        echo '<tr><th id="openAccessTitle">Open Access:<span class="helptooltip"><p>In order to add the corpus to the view and search functions allow open access publication of the corpus in the LAUDATIO-Repository.</p>';
            echo $this->Html->image("help.png",array(
                'border' => '0',
                'width'=>'20px',
                'alt' => 'help',
            ));
        echo '</span></th></tr><tr><td>';

        $openAccessUrl = Router::url(array('controller'=>'XMLObjects','action'=>'toggleOpenAccess'),true);
        $indexingUrl = Router::url(array('controller'=>'XMLObjects','action'=>'toggleIndexing'),true);

        if($openAccess) {
            echo '<input data-url="'.$openAccessUrl.'" type="radio" id="openAccessTrue" name="openAccess" checked="checked">All users are allowed to view this Corpus</br>';
            echo '<input data-url="'.$openAccessUrl.'" type="radio" name="openAccess">Only allowed users can view this Corpus</td></tr>';
        }
        else {
            echo '<input data-url="'.$openAccessUrl.'" type="radio" id="openAccessFalse" name="openAccess">All users are allowed to view this Corpus</br>';
            echo '<input data-url="'.$openAccessUrl.'" type="radio" name="openAccess"  checked="checked">Only allowed users can view this Corpus</td></tr>';
            //echo '<input data-url="'.$openAccessUrl.'" type="radio" id="openAccessFalse" name="openAccess" checked="checked">Only allowed users can view this Corpus</td></tr>';
            //echo '<input data-url="'.$openAccessUrl.'" type="radio" name="openAccess"  checked="checked">Only allowed users can view this Corpus</td></tr>';
        }

        echo '<tr><th id="indexingTitle">Index Corpus for Search:<span class="helptooltip"><p>Allow/Prohibit to add the corpus to the search functions in the LAUDATIO-Repository.</p>';
        echo $this->Html->image("help.png",array(
            'border' => '0',
            'width'=>'20px',
            'alt' => 'help',
        ));
        echo '</span></th></tr><tr><td>';

        if($indexing) {
            echo '<input data-url="'.$indexingUrl.'" type="radio" id="indexingTrue" name="indexing" checked="checked">Allow to add the corpus to the search functions</br>';
            echo '<input data-url="'.$indexingUrl.'" type="radio" name="indexing">Don\'t allow to add the corpus to the search functions</td></tr>';
        }
        else {
            echo '<input data-url="'.$indexingUrl.'" type="radio" id="indexingFalse" name="indexing">Allow to add the corpus to the search functions</br>';
            echo '<input data-url="'.$indexingUrl.'" type="radio" name="indexing"  checked="checked">Don\'t allow to add the corpus to the search functions</td></tr>';
        }

?>
    <tr class="userlist" id="userlist" data-url="<?php $url = Router::url(array('controller'=>'XMLObjects','action'=>'removeCorpusUser'),true); echo $url;?>"><th id="allowedUsersTitle">Allowed Users</th>
    <?php
    foreach($users as $user) {
            echo '<tr class="userlist"><td><span>'.$user.'</span>';
            echo $this->Html->image("delete.ico",array(
                "border" => "0",
                'width'=>'15px',
                'class' => 'clickable removeUser',
                'style'=>'float:right; margin-left:10px;',
                'title' => 'remove user',
                "alt" => "remove"
            ));
            echo '</td></tr>';
    }
    ?>
    <tr><td>New User: <input type="text"><button id="addUserButton" data-url="<?php $url = Router::url(array('controller'=>'XMLObjects','action'=>'addCorpusUser'),true); echo $url;?>" type="button">Add User</button>
    <span id="CorpusUserResponse"></span>
    </td></tr>

</table>
</br>
<input type="submit" value="Save Changes">
</form>
</br>