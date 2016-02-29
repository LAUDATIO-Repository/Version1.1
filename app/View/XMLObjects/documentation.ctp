<?php
App::uses('XMLObject', 'AppController', 'Controller', 'Utility', 'Xml');
App::uses('HtmlHelper', 'View/Helper');

echo $this->Html->css('/js/css/tabs.css', null, array('inline' => false));
echo $this->Html->css('/js/css/jquery-ui.css', null, array('inline' => false));
echo $this->Html->script('/js/jquery.tabs.js',array('inline' => false));

$this->set('navbarArray',array(array('Documentation','documentation')));
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>LAUDATIO - Description</title>
    <script type="text/javascript">
        $(document).ready(function()  {
            jQuery('dl#tabs2').addClass('enabled').timetabs({
                defaultIndex: 0,
                animated: 'slide',
                interval: 2500
            });

            /* animation preview
            jQuery('input[name=animation]').click(function() {
                $this = jQuery(this);
                jQuery.fn.timetabs.switchanimation($this.val());
            });*/
        });
    </script>
</head>

<!-- Piwik -->
<script type="text/javascript">
    var _paq = _paq || [];
    _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
    _paq.push(["setCookieDomain", "*.www.laudatio-repository.org"]);
    _paq.push(["trackPageView"]);
    _paq.push(["enableLinkTracking"]);

    (function() {
        var u=(("https:" == document.location.protocol) ? "https" : "http") + "://www.laudatio-repository.org/piwik/";
        _paq.push(["setTrackerUrl", u+"piwik.php"]);
        _paq.push(["setSiteId", "1"]);
        var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
        g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
    })();

/*
    var tab ;
    $("#tabs").tabs({
        beforeActivate :  function( event, ui ) {
            $("html, body").animate({ scrollTop: $("#tabs").offset().top }, 1000);
        }
    });

    $('.external-tab').click(function (event) {
        event.preventDefault();
        tab = $(this).attr('href');
        var index = $('div[id^=tabs-]').index($(tab));
        $('#tabs').tabs( "option", "active", index );
    });
*/
</script>
<!-- End Piwik Code -->

<body>
<div class="itemdiv">
<div class="centeredContent">
<h3>Documentation</h3>
<!--<p>A step by step guide on how to use the repository can be found-->
<?php
/*
    echo $this->Html->link("here",
        "http://www.laudatio-repository.org/laudatio/wp-admin/tmp/2014/10/LAUDATIO_Anwender_Odebrecht2014.pdf",
        array('title' => 'Step by step guide on how using the repository', 'target' => '_blank')
    );
*/
?>
<!--.</p>-->
<dl class="tabs" id="tabs2">

<dt>Browse
    <?php
    echo $this->Html->link(
        $this->Html->image('linkTo_smallerq.png', array('width'=>'12px', 'title' => 'Link to Browse', 'border' => '0')),
        '../../../repository/view',
        array('target' => '_blank', 'escape' => false)
    );
    ?>
</dt>
<dd>
    <img src="app/webroot/img/documentation_browse.png" alt="LAUDATIO Documentation Browse example" style="width: 500px; height: 307px; float: right;" />
    <p>Via 'Browse' you can have a look at the Documentation page to see the metadata for each corpus in the repository to inform yourself. Each corpus is documented with the LAUDATIO-metadata scheme (documentation for
        <?php
        echo $this->Html->link('metadata TEI XML scheme', 'https://github.com/korpling/LAUDATIO-Metadata/');
        ?>) and gets an own corpus-'

        <?php
        echo $this->Html->link('Browse', '../../../repository/view');
        ?>'-page.</p>
    <span>Each set of metadata provides information with respect to</span></br>

    1. <b>'Corpus'</b> to answer questions such as</br>
    <ul>
        <li>Who is building the corpus?</li>
        <li>Which university, research group or project is involved?</li>
        <li>What revision history does the corpus have?</li>
        <li>Which license is assigned to the corpus?</li>
    </ul>

    2. <b>'Documents'</b> to answer questions such as</br>
    <ul>
        <li>Which historical texts are included?</li>
        <li>Which editions or manuscripts are used as the base for digitization?</li>
        <li>What kind of text extraction is chosen, e.g. sentences, excerpts, or the whole text?</li>
        <li>Which annotation layers are applied to a single document?</li>
    </ul>

    3. <b>'Annotation'</b> to answer questions such as</br>
    <ul>
        <li>How many and which layers of annotation are there?</li>
        <li>Which tag sets are applied in which format?</li>
        <li>What does a specific tag mean in a given annotation layer?</li>
    </ul>

    4. <b>'Preparation Steps'</b> to answer questions such as</br>
    <ul>
        <li>Who annotated which annotation layer in which manner (semi-automatic, manual etc.)?</li>
        <li>What kind of annotation tool is used?</li>
        <li>Which conversion steps are done?</li>
    </ul>

    <p>To get answers to the questions above, click on the section of interest and navigate through the information. If it is impossible to provide a certain kind of information, the value will set on 'NA' for <i>not available</i> by default.  Notice that each
        <?php
        echo $this->Html->link('CorpusCreator', '../../../repository/Users/requestAccount');
        ?> is responsible for the information provided by the metadata.
        Additionally, each corpus gets a
        <?php
        echo $this->Html->link('persistent identifier', '../../../repository/technical-documentation/software/handle.html');
        ?> (5) and a recommended form of for citation (6) for referencing purposes. On each single Corpus-'Browse'-page every format is available for download (7).
        If available, a corpus has a link to the

        <?php
        echo $this->Html->link('search- and visualization system ANNIS', 'http://annis-tools.org/');
        ?> (8).
    </p>
</dd>
<dt>Search
    <?php
    echo $this->Html->link(
        $this->Html->image('linkTo_smallerq.png', array('width'=>'12px', 'title' => 'Link to Search', 'border' => '0')),
        '../../../repository/search',
        array('target' => '_blank', 'escape' => false)
    );
    ?>
</dt>
<dd>
    <img src="app/webroot/img/documentation_search.png" alt="LAUDATIO Documentation Search example" style="width: 500px; height: 460px; float: right;" />

    <p>Via 'Search' you can search through all corpus metadata at once to find your corpus of interest in the hit list (4). The metadata Search is based on the LAUDATIO-
        <?php
        echo $this->Html->link('TEI XML metadata scheme', 'https://github.com/korpling/LAUDATIO-Metadata/');
        ?>. You have two overall search options; the ‘free metadata Search’(1) and the ‘faceted metadata Search’(2) which you can combine with each other, too.</p>

    <p>Using the <b>‘faceted metadata Search”</b> will reduce the hit list of all available corpora in the LAUDATIO-Repository, too. By clicking on a facet (2) and choosing a single value (3) the hit list will be reduced and only the corpora will stay in the hit list on which the facet values applies. For each facet you will get all possible values among which you can choose. Adding more facets values will reduce the hit list(4) step by step.</p>

    <ul>
        The first group of facets covers metadata for the corpus itself:<br/>
        <li>name</li>
        <li>project</li>
        <li>format</li>
        <li>date</li>
        <li>size.</li>
    </ul>
    <ul>
        The second group of facets covers metadata for each document of a corpus:<br/>
        <li>annotation layers</li>
        <li>document date</li>
        <li>size.</li>
    </ul>

    <p><u>The hit list box(4)</u> provides an overview of resulting corpora including the corpus title, project description, size, and list of documents.</p>

    <p>Inserting a search term in the <b>‘free metadata Search’</b> (1) will reduce the hit list of all available corpora in the LAUDATIO-Repository and only those corpora. There are five options between which you can choose to get the best hit(4) for your metadata Search:</p>

    <p>Partial match: Supports searching for e.g. with and without umlauted vowel 'Maerchen'. The result from search string will contain 'Maerchen' or 'Märchen'.<br/>
        Exact match:	Supports exact matches e.g. with umlauted vowel: 'Märchen'.<br/>
        Fuzzy match:	Supports fuzzy searching based on edit distance algorithm.<br/>
        Match all:	Supports searching with the operator \'AND\' e.g. \'jiddisch AND version\'.<br/>
        Match any: 	Supports searching with the operator \'OR\' e.g. \'jiddisch OR version\'.<br/>
    </p>
    <p>
        You can use the logical operators ‘AND’ and ‘OR’ within the ‘free metadata Search”. The operators must each be enclosed with spaces; otherwise, the Search string will be ignored.<br/>
        An example for logical operators:<br/>
        ‘Märchen AND Linguistik’<br/>
        ‘Märchen OR Linguistik’<br/>
    </p>
    <p>
        Note that the results for the free metadata Search may apply to different aspects of metadata.<br/>
        Results for the word form ‘Märchen’ may find a title of a document or/and of a corpus or annotation layer.<br/>
    </p>
<!--
    <ul>
        <li><b>No Registration </b> is needed to use the search function of the LAUDATIO-Repository.</li>
        <li>You can use the <b>faceted search and/or the full-text search</b> to retrieve information about all corpora in the LAUDATIO-Repository.</li>
        <li>The faceted search will filter all hits (of all available corpora in the LAUDATIO-Repository). For example: If you select the facet 'Formats' and check on 'exmaralda', you will only get the corpora which have EXMARaLDA as a format. The activated facet will be displayed above the hits. You can use more than one facet for your search.</li>
        <li>The full-text search has several options.</li>
        <ul>
            <li>Partial match - The lucene-based Full-Text Search supports partial matches, e.g. without mutated vowel: 'Maerchen'. The result from this search request is for e.g. 'Maerchen' or 'MÃƒÂ¤rchen'.</li>
            <li>Exact match - The lucene-based Full-Text Search supports exact matches e.g. with mutated vowel: 'MÃƒÂ¤rchen'.</li>
            <li>Fuzzy match - The lucene-based Full-Text Search supports fuzzy searches based on the Levenshtein Distance, or Edit Distance algorithm.</li>
            <li>Match all - The lucene-based Full-Text Search supports match all searches with the operator \'AND\' e.g. \'jiddisch AND version\'.</li>
            <li>Match any - The lucene-based Full-Text Search supports match any searches with the operator \'OR\' e.g. \'jiddisch OR version\'.</li>
            <li>You can choose between these options to get the best results for your search.</li>
        </ul>
        <p><b>Tip</b>: The Logical operators "AND" and "OR" must each be enclosed with spatien, otherwise the search string will be ignored!<br/>
            An example of the correct use of the logical operators:<br/>
            "mÃ¤rchen AND Linguistik"<br/>
            "mÃ¤rchen OR Linguistik"<br/>
            Not correct use of the logical operators:<br/>
            "mÃ¤rchenANDLinguistik"<br/>
            "mÃ¤rchenORLinguistik"<br/>
            Here are just a part of the search string is considered ("mÃ¤rchen"):<br/>
            "mÃ¤rchen ANDLinguistik"<br/>
            "mÃ¤rchen ORLinguistik"<br/>
        </p>
        <li>You can combine faceted search and full-text search. For example, choose the facet 'Formats' and a value, e.g. 'EXMARaLDA' and add a text in the input box, e.g. 'Herbology' and will only get hits where all criteria are true.</li>
    </ul>
-->
</dd>

<dt>Import
    <?php
    echo $this->Html->link(
        $this->Html->image('linkTo_smallerq.png', array('width'=>'12px', 'title' => 'Link to Import', 'border' => '0')),
        '../../../repository/import',
        array('target' => '_blank', 'escape' => false)
    );
    ?>
</dt>
<dd>
    <img src="app/webroot/img/documentation_import.png" alt="LAUDATIO Documentation import example" style="width: 500px; height: 390px; float: right;" />
    <p>
        If you would like to upload your own corpus in the LAUDATIO-Repository, you need to be registered
        (create an
        <?php
        echo $this->Html->link('account)', '../../../repository/auth/Authentifizierung_HU_vorlage.pdf');
        ?>. If you already have an official Humboldt-University
        <?php
        echo $this->Html->link('account', '../../../repository/Users/requestAccount');
        ?>, you can use it instead of creating a new account.
    </p>

    <p>
        First, fill in the 'Corpus Name' with an ID which might be an acronym, e.g. 'laudatio:RIDGES' (1) and a 'Corpus Label' which should be the full name of the corpus, e.g. 'Register in German Science' (2). Upload the
        <?php
        echo $this->Html->link('LAUDATIO metadata TEI XML', 'https://github.com/korpling/LAUDATIO-Metadata/');
        ?> file which will be immediately validated (3). You will get feedback as to whether the TEI XML file is valid or not. For an instruction on creating the LAUDATIO TEI XML metadata for your corpus switch to the equivalent tab. Then you can upload the corpus itself (4). A corpus may have several formats. You can upload a zipped file for each format. Add the display name of each format.
    </p>

    <p>
        In a next step you can chose whether the corpus, its metadata and its formats will be published and free to use in the

        <?php
        echo $this->Html->link('Browse', '../../../repository/view');
        ?> (5) and

        <?php
        echo $this->Html->link('Search', '../../../repository/search');
        ?> (6) function of the LAUDATIO-Repository. If you would like to check the upload in your private account space first, it is possible to set the open-access checks later with the help of the

        <?php
        echo $this->Html->link('Modify', '../../../repository/modify');
        ?> function. Finally, chose the

        <?php
        echo $this->Html->link('Creative Commons license', 'http://www.creaticecommons.org');
        ?> for your corpus (7).<br/>
        Start the upload process!
    </p>
<!--
    <ul>
        <li><b>Registration:</b> You need to be registered (create an
            <?php
            #echo $this->Html->link('account)', '../../../repository/Users/requestAccount');
            ?>
            to upload corpora. If you already have a HU Account, you don't have to create a new account.  You can use your HU Account instead.</li>
        <li><b>Import</b> a corpus and fill in the 'Corpus Name' with an ID which might be an acronym, e.g. 'laudatio:RIDGES' for 'Register in German Science' and a 'Corpus Label' which should be the full name of the corpus, e.g. 'Register in German Science'. </li>
        <li><b>Upload</b> the metadata as a TEI XML file. You find the scheme (RNG or DTD) and documentation (TEI ODD) for the merged TEI-Header and the full workflow description for compiling the metadata in the 'Documentation' navigation bar. You only need to upload the merged TEI XML file for the whole corpus. The metadata will be validated against the scheme. You will get feedback whether the TEI XML file is valid or not.</li>
        <li><b>Upload</b> the corpus formats. A corpus may have several formats. You can upload a zipped file for each format. Add the display name of the format.</li>
    </ul>
-->
</dd>



<dt>Modify
    <?php
    echo $this->Html->link(
        $this->Html->image('linkTo_smallerq.png', array('width'=>'12px', 'title' => 'Link to Modify', 'border' => '0')),
        '../../../repository/modify',
        array('target' => '_blank', 'escape' => false)
    );
    ?>
</dt>
<dd>
    <p>
        For updating the LAUDATIO-metadata and the corpus data,
        <?php
        echo $this->Html->link('CorpusCreators', '../../../repository/Users/requestAccount');
        ?> can use Modify-function.
        A CorpusCreator owns the account under which a corpus was uploaded.

    </p>

    <ul>
        You can change the following corpus properties:<br/>

        <li>Corpus label: <br/>
            Changing the label will change the display name in the

            <?php
            echo $this->Html->link('Browse', '../../../repository/view');
            ?>-function.
        </li>
        <li>Corpus name: <br/>
            Cannot be modified.
        </li>
        <li>Corpus state: <br/>
            Changing the state will set the current version active or inactive. An active state of a corpus means that it is available at the

            <?php
            echo $this->Html->link('Browse', '../../../repository/view');
            ?> and
            <?php
            echo $this->Html->link('Search', '../../../repository/search');
            ?>-function in the repository.
        </li>
        <li>Data streams: <br/>
            You can add, change and delete the corpus format files and update or add its metadata.
        </li>
        <li>Data labels: <br/>
            Changing the label will change the display name in the
            <?php
            echo $this->Html->link('Browse', '../../../repository/view');
            ?>-function.
        </li>
        <li>Data MIME types: <br/>
            Multi-purpose Internet Mail Extensions specifies the file name of a data stream and indicate the used/given file types.
        </li>
        <li>Data state: <br/>
            Changing the state will set the data stream current version active or inactive. An active state of a corpus data means that it is available at the
            <?php
            echo $this->Html->link('Browse', '../../../repository/view');
            ?> and
            <?php
            echo $this->Html->link('Search', '../../../repository/search');
            ?>-function in the repository.
        </li>
        <li>Set version: <br/>
            Defines whether the applied changes will create a new version of the corpus or replace the current version.
        </li>
<!--
        <li><b>Registered corpus owner</b> (the account who uploaded the corpus) is allowed to modify the corpus.</li>
        <li>
            <b>Properties</b><br>
            <span>Corpus label: Changing the label will change the display name in the navigation bar 'browse' for the corpus.</span><br>
            <span>Corpus name: Can't be modified.</span><br>
            <span>Corpus state: Changing the state will set the current version active or inactive. An active state of a corpus means that it is available at the navigation bars 'browse' and 'search'.</span><br>

            <b>Data streams</b><br>
            <span>Data streams: You can download, add, change and delete single data streams of your corpus.</span><br>
            <span>Data labels: Changing the label will change the display name in the navigation bar 'browse' for the corpus.</span><br>
            <span>Data MIME types: Multi-purpose Internet Mail Extensions specifies the file name of a data stream and indicate the used/given file types.</span><br>
            <span>Data state: Changing the state will set the current version active or inactive. An active state of a corpus means that it is available at the navigation bars 'browse' and 'search'.</span><br>
            <span>Set version: Defines whether the applied changes will create a new version of the corpus or replace the current version.</span>
        </li>
-->
    </ul>
</dd>

<dt>LAUDATIO metadata specification and scheme</dt>
<!--<dt><a name="odd" href="#odd">TEI ODD and Schema</a></dt>-->

<dd>
    <!--<b>Scheme 7</b><br>-->
    <p>
        The metadata for each corpus in the LAUDATIO-Repository is built on a customization of the
        <?php
        echo $this->Html->link('TEI P5 format', 'http://www.tei-c.org/Guidelines/P5/');
        ?>. The metadata will be uploaded for each corpus as a TEI XML file. This file is validated against the scheme which is built via the
        <?php
        echo $this->Html->link('TEI specification file ODD (One Document Does it all)', 'http://www.tei-c.org/Guidelines/Customization/odds.xml');
        ?>. Note that there are several versions of the
        <?php
        echo $this->Html->link('LAUDATIO-ODD and scheme', 'https://github.com/korpling/LAUDATIO-Metadata/');
        ?>. We customize the ODD according to the needs of the repository and the Users' perspectives.
        If you have feature request, please Contact us
        <?php
        $mail = 'laudatio-user@hu-berlin.de';
        $myMail = $this->Text->autoLinkEmails($mail);
        echo '('.$myMail.').</p>';
        ?>
    </p>

    <!--<p>The document is the customization of the TEI p5 scheme for the LAUDATIO-Repository. The metadata will be uploaded for each corpus as a TEI XML file. This file is validated against the scheme produced by the ODD. Note that there are several versions of the LAUDATIO-ODD, we start here with scheme 7. We customize the ODD according to the needs of the repository and the users' perspectives. If you have feature request, please contact us-->
        <?php
        #$mail = 'laudatio-user@hu-berlin.de';
        #$myMail = $this->Text->autoLinkEmails($mail);
        #echo '('.$myMail.').</p>';
        ?>

        <b>Current TEI scheme</b><br>

        <?php
        $corpus_rng_link = '../../../repository/files/documentation/corpus/version7/teiODD_LAUDATIOCorpus_Scheme7_RNG.zip';
        $corpus_rnc_link = '../../../repository/files/documentation/corpus/version7/teiODD_LAUDATIOCorpus_Scheme7_RNC.zip';

        $corpus_doc_presentation_link = '../../../repository/files/documentation/corpus/version7/teiODD_LAUDATIOCorpus_S7/document.html';
        //$corpus_doc_link = '../../../repository/files/documentation/corpus/version7/teiODD_LAUDATIODocumentation_S7.zip';
        $corpus_odd_link = '../../../repository/files/documentation/corpus/version7/teiODD_LAUDATIOCorpus_S7.zip';

        echo '<table><tr>';
        echo '<td><div class="download">';
        echo "<u>Corpus</u>";
        echo "<br>";

        echo 'Download <a href="'.$corpus_odd_link.'">ODD</a><br>';
        echo 'Download <a href="'.$corpus_rng_link.'">RelaxNG scheme</a><br>';
        echo 'Download <a href="'.$corpus_rnc_link.'">RelaxNC scheme</a><br>';
        //echo 'Download <a href="'.$corpus_doc_link.'">Documentation</a><br>';
        echo '<a href="'.$corpus_doc_presentation_link.'">documentation</a><br>';
        echo '</div></td>';


        $document_rnc_link = '../../../repository/files/documentation/document/version7/teiODD_LAUDATIODocument_Scheme7_RNC.zip';
        $document_rng_link = '../../../repository/files/documentation/document/version7/teiODD_LAUDATIODocument_Scheme7_RNG.zip';
        //$document_doc_link = '../../../repository/files/documentation/document/version7/teiODD_LAUDATIODocumentation_S7.zip';
        $document_odd_link = '../../../repository/files/documentation/document/version7/teiODD_LAUDATIODocument_Scheme7.zip';
        $document_doc_presentation_link = '../../../repository/files/documentation/document/version7/teiODD_LAUDATIODocument_Scheme7/document.html';


        echo '<td><div class="download">';
        echo "<u>Document</u>";
        echo "<br>";

        echo 'Download <a href="'.$document_odd_link.'">ODD</a><br>';
        echo 'Download <a href="'.$document_rng_link.'">RelaxNG Scheme</a><br>';
        echo 'Download <a href="'.$document_rnc_link.'">RelaxNC Scheme</a><br>';
        //echo 'Download <a href="'.$document_doc_link.'">Documentation</a><br>';
        echo '<a href="'.$document_doc_presentation_link.'">documentation</a><br>';
        echo '</div></td>';

        $preparation_rnc_link = '../../../repository/files/documentation/preparation/version7/teiODD_LAUDATIOPreparation_Scheme7_RNC.zip';
        $preparation_rng_link = '../../../repository/files/documentation/preparation/version7/teiODD_LAUDATIOPreparation_Scheme7_RNG.zip';
        $preparation_doc_presentation_link = '../../../repository/files/documentation/preparation/version7/teiODD_LAUDATIOPreparation_S7/document.html';
        //$preparation_doc_link = '../../../repository/files/documentation/preparation/version7/teiODD_LAUDATIODocumentation_S7.zip';
        $preparation_odd_link = '../../../repository/files/documentation/preparation/version7/teiODD_LAUDATIOPreparation_S7.zip';


        echo '<td><div class="download">';
        echo "<u>Preparation</u>";
        echo "<br>";


        echo 'Download <a href="'.$preparation_odd_link.'">ODD</a><br>';
        echo 'Download <a href="'.$preparation_rng_link.'">RelaxNG Scheme</a><br>';
        echo 'Download <a href="'.$preparation_rnc_link.'">RelaxNC Scheme</a><br>';
        //echo 'Download <a href="'.$preparation_doc_link.'">Documentation</a><br>';
        echo '<a href="'.$preparation_doc_presentation_link.'">documentation</a><br>';
        echo '</div></td>';
        echo '</tr></table>';

        ?>
</dd>




<!--<dt><a href="#">Tab One</a></dt>-->
<dt>How to create TEI-metadata for your corpus</dt>

<dd>
    <ul>
        <!--<b>Scheme 7</b><br>-->
        <?php
        #<dt>TEI ODD and Schema</dt>
        #<a href="#anfang">Seitenanfang</a>
        #<a href="../projektintern.htm#anker">Anker definieren und Verweise zu Ankern</a>
        #echo '<a href="#odd">Here</a> you can find the Downloads for Schema 6.<br>';
        ?>
        <script>
            //$('#odd').trigger('click');
            /*
             $( document ).ready(function() {
             $("odd" ).click(function() {
             alert( "Blubb..." );
             });
             });
             */
        </script>
        <br>

        <p>
            The LAUDATIO metadata is composed of three components: Information about the corpus (CorpusHeader) itself, information about all historical documents (DocumentHeader) in the corpus and about all annotation layers (PreparationHeader).

            <?php
            echo $this->Html->link('Here', 'https://github.com/korpling/LAUDATIO-Metadata/');
            ?> you get the technical Documentation of the LAUDATIO metadata.
        </p>

        <p>
            First, collect the following information if available about your corpus:
        </p>
<!--
        <b> Creating your own metadata</b>
        <li>Download the current version of the templates for each section of a corpus ('Corpus', 'Document' and 'Preparation').</li>
        <li>Fill in the required information:</li>
-->
        <ul>
            1. CorpusHeader:<br>
<!--
            <li>For one corpus you only need one TEI XML file.</li>
            <li>Fill in the corpus creators, annotators, project descriptions, list of documents (with a short name) and the encodings for each format of your corpus.</li>
            <li>For every format there is one encodingDesc where you list all annotation keys and values of each format (there may be differences between the formats).</li>
-->
            <li>Corpus editor(s)</li>
            <li>Corpus annotator(s), persons in charge for transcription and infrastructure</li>
            <li>Annotation guideline(s) for all annotation layers in the corpus including a description for each annotation tag</li>
            <li>Name and version of the corpus formats</li>
            <li>Version number, publication date and revision steps</li>
            <li>Project description and homepage URL</li>
            <li>Licenses</li>
            <li>Size</li>
        </ul>
        <!--<p>For help, see other TEI XML files which are already uploaded in the LAUDATIO-Repository or the TEI ODD for the respective section.</p>-->
        <?php
            #$corpus_template_link = '../../../repository/files/documentation/templates/version7/CorpusHeader/LAUDATIO_S7_Corpus.xml';
            #echo 'Download <a href="'.$corpus_template_link.'">Corpus - Template Version 7</a><br>';
        ?>

        <ul>
            2. DocumentHeader (one header for each historical document):<br>
<!--
            <li>For each document you need one TEI XML file.</li>
            <li>Fill in all required information, e.g. author of the document, place and date.</li>
            <li>Every document has its own list of annotations (there may be differences between the documents).</li>
-->
            <li>Title of the historical text</li>
            <li>Author of the historical text</li>
            <li>Editor of the historical text</li>
            <li>Publication place, date, edition, collection, history of the historical text</li>
            <li>Size (tokens or words)</li>
            <li>Annotation layers in the document</li>
        </ul>
        <!--<p>For help, see other TEI XML files which are already uploaded in the LAUDATIO-Repository or the TEI ODD for the respective section.</p>-->
        <?php
            #$document_template_link = '../../../repository/files/documentation/templates/version7/DocumentHeader/LAUDATIO_S7_Document.xml';
            #echo 'Download <a href="'.$document_template_link.'">Document - Template Version 7</a><br>';
        ?>
        <ul>
            3. PreparationHeader (one header for each annotation layer):<br>
            <li>Annotation editor(s)</li>
            <li>Annotators, persons in charge for transcription and infrastructure</li>
            <li>Formats and tools</li>
            <li>Editing/annotating steps</li>
            <li>Conversion steps</li>
            <li>Version number, publication date and revision steps</li>
            <li>Project description and homepage URL</li>
            <li>Licenses</li>
<!--
            <li>For each annotation layer you need one TEI XML file irrespective of how the annotation has been done.
                Note that if one annotation layer, e.g. a part of speech annotation (pos) is applied in all formats of the corpus, one TEI XML file is sufficient for this annotation layer.</li>
            <li>Every TEI XML file contains the whole preparation history for one annotation layer, including the first annotation, converting processes and checking methods. For each preparation step and format there is one encodingDesc. For example: A first annotation is applied with the EXMARaLDA Editor and afterwards converted to relANNIS format. For the EXMARaLDA format there is one encodingDesc and for the relANNIS format another one where the tools, the checking methods and corpus architecture information such as segmentation are listed, too.</li>
-->
        </ul>
      <!--<p>For help, see other TEI XML files which are already uploaded in the LAUDATIO-Repository or the TEI ODD for the respective section.</p>-->
        <?php
            #$preparation_template_link = '../../../repository/files/documentation/templates/version7/PreparationHeader/LAUDATIO_S7_Preparation.xml';
            #echo 'Download <a href="'.$preparation_template_link.'">Preparation - Template Version 7</a><br>';
        ?>
        <!--<li>Merge all TEI-Header with the teitool</li>-->
        <ul>
<!--
            <li>Build a folder structure as the following:</li>
            <span>First order folder 'CorpusName'</span><br>
            <span>Second order folder 'CorpusHeader' = contains one TEI XML file for the corpus which is validated with the scheme for the section 'Corpus'.</span><br>
            <span>Second order folder 'DocumentHeader' = contains all TEI XML files for the documents which are validated with the scheme for the section 'Document'.</span><br>
            <span>Second order folder 'PreparationHeader' = contains all TEI XML files for the preparationSteps for each annotation which are validated with the scheme for the section 'Preparation'.</span><br>
            <span>Second order folder 'AllHeader' = contains nothing.</span><br>
            <li>Run the teitool in you command line.</li>
-->
            <li>CorpusHeader template (scheme 7)</li>
            <li>DocumentHeader template (scheme 7)</li>
            <li>PreparationHeader template (scheme 7)</li>

            <?php
            #$teitool_link = '../../../repository/validation/teitool-1.0.jar';
            #echo 'Download <a href="'.$teitool_link.'">teitool 0.1</a><br>';

            $teitool_link = 'https://github.com/thomaskrause/laudatioteitool/';
/*
            $teitool_link = 'https://github.com/thomaskrause/laudatioteitool/releases/download/v0.8/teitool-0.8.jar';
            echo 'Download <a href="'.$teitool_link.'" target="_blank">teitool 0.8</a><br>';

            $teitool_doc_link = 'https://github.com/thomaskrause/laudatioteitool/releases';
            echo 'Documentation <a href="'.$teitool_doc_link.'" target="_blank">teitool 0.8</a><br>';
*/
            ?>
        </ul>

        <p>Note that all headers need to be merged with the help of the
            <?php
            echo '<a href="'.$teitool_link.'" target="_blank">teitool</a><br>';
            ?> into the AllHeader (xml-file), which will be uploaded in the LAUDATIO-Repository.</p>

        For example:
        <!--The RIDGES Herbology Corpus gets<br/>-->

        <?php
        echo $this->Html->link('The RIDGES Herbology Corpus', '../../../repository/corpus/laudatio:RIDGES-Herbology');
        ?> gets<br/>

        <li>1 CorpusHeader</li>
        <li>29 DocumentHeader</li>
        <li>78 PreparationHeader</li>


        <p>which are merged with the

            <?php
            echo '<a href="'.$teitool_link.'" target="_blank">teitool</a><br>';
            ?> into the AllHeader (xml-file) which can be uploaded. The metadata in the AllHeader provides the information, which is available in the
            <?php
            echo $this->Html->link('Browse', '../../../repository/view');
            ?>- or
            <?php
            echo $this->Html->link('Search', '../../../repository/search');
            ?>-function of the repository.</p>

        <p>All corpora in the repository have such an AllHeader. You can download the TEI XML metadata of an already published corpus for copying purposes.</p>
        <!--<li>Upload the merged TEI XML file into LAUDATIO-Repository.</li>-->
    </ul>
</dd>
</dl>
</div>
</div>
</body>
</html>