<?php
/**
 * Created by PhpStorm.
 * User: DZielke
 * Date: 07.07.14
 * Time: 14:45
 */

	$this->set('navbarArray',array(array('Browse','browse')));
	echo '<table>';

	echo '<th>Object<span class="helptooltip"><p>Click on an object to display the corpus.</p>';
	echo $this->Html->image("help.png",array(
        'border' => '0',
        'width'=>'20px',
        'alt' => 'help',
    ));
	echo '</span></th>';

	echo '<th>Label</th><tr>';
	//$xml = simplexml_load_string(html_entity_decode($xmloutput)) or die("Error: Can not create object");

		foreach ($corpora as $corpus) {
            $pid = $corpus['pid'];
            $label = $corpus['label'];
            $pids = preg_split('/:/', $pid);
            echo '<td title ='.$pids[1].'>';
            echo $this->Html->link($pids[1],array('controller' => 'XMLObjects', 'action' => 'corpus',$pid));
            #echo $this->Html->link($pids[1],('view/:objects', array('controller' => 'XMLObjects', 'action' => 'objects',$pid), array('pass'=>array('objects'))));
            #Router::connect('view/:objects', array('controller' => 'XMLObjects', 'action' => 'view'), array('pass'=>array('objects')));
            echo '</td>';
            echo '<td title="'.$label.'">';
            echo $label;
            echo "</td>";

            //echo '<td><button type="button" onclick="location.href=\''.Router::url(array('controller' => 'XMLObjects','action' => 'objects',$pid)).'\'" value="View Object">View Object</button></td>';
            echo '<td><button type="button" onclick="location.href=\''.Router::url(array('controller' => 'XMLObjects','action' => 'corpus',$pid)).'\'" value="View Corpus">View Corpus</button></td>';
            echo '</tr>';
        }


	echo '</table>';
    if(count($corpora) == 0)
        echo '<p>No corpora available</p>';
?>