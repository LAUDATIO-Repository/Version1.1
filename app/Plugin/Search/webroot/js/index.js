jQuery(document).ready(function($) {
    $('.facet-view-simple').facetview({
        search_url: '//depot1-7.cms.hu-berlin.de/laudatio5testtest/_search?--allow-running-insecure-content',
        //search_url: '//depot1-7.cms.hu-berlin.de/laudatio5/_search?',

        search_index: 'elasticsearch',
        freetext_submit_delay: "200", // in ms (deactivated, use the search button)
        highlight_documents: true,
        show_documents: 5,  //defines how much documents will be shown in a result before truncating
        show_facetitems:10,
        facets: [
            {'field': 'teiCorpus.teiHeader.fileDesc.titleStmt.title.$.untouched', 'size': 100, 'order':'term', 'display': 'Corpora','type':'corpus'},
            {'field': 'teiCorpus.teiHeader.fileDesc.publicationStmt.idno.$.untouched', 'size': 100, 'order':'term', 'display': 'Projects','type':'corpus'},
            {'field': 'teiCorpus.teiHeader.encodingDesc.appInfo.application.@ident', 'size': 100, 'order':'term', 'display': 'Formats','type':'corpus'},
            {'field': 'teiCorpus.teiHeader.fileDesc.publicationStmt.date.@when', 'range':'date', 'histogram':'year','size': 100, 'display': 'Date - Corpus','type':'corpus'},

            //with subfacets
            //{'field': 'teiCorpus.teiHeader.fileDesc.extent.$', 'range':'extent', 'histogram' : 1000, 'display': 'Size - Corpus','subfacets':[['teiCorpus.teiHeader.fileDesc.extent.@type','words','Words'],['teiCorpus.teiHeader.fileDesc.extent.@type','tokens','Tokens']]},
            {'field': 'teiCorpus.teiHeader.fileDesc.extent.$', 'size': 100, 'display': 'Size - Corpus','subfacets':[['teiCorpus.teiHeader.fileDesc.extent.@type','words','Words'],['teiCorpus.teiHeader.fileDesc.extent.@type','tokens','Tokens']],'type':'corpus'},
            {'field': 'teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec.valList.valItem.@ident', 'nested':'teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec','size': 1000, 'order':'term', 'display': 'Annotation - Graphical','filter':['teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec.@ident','graphical'],'type':'document'},
            {'field': 'teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec.valList.valItem.@ident', 'nested':'teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec','size': 1000, 'order':'term', 'display': 'Annotation - Lexical', 'filter':['teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec.@ident','lexical'],'type':'document'},
            {'field': 'teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec.valList.valItem.@ident', 'nested':'teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec','size': 1000, 'order':'term', 'display': 'Annotation - Transcription','filter':['teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec.@ident','transcription'],'type':'document'},
            {'field': 'teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec.valList.valItem.@ident', 'nested':'teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec','size': 1000, 'order':'term', 'display': 'Annotation - Syntactical','filter':['teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec.@ident','syntactical'],'type':'document'},
            {'field': 'teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec.valList.valItem.@ident', 'nested':'teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec','size': 1000, 'order':'term', 'display': 'Annotation - Meta','filter':['teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec.@ident','meta'],'type':'document'},
            {'field': 'teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec.valList.valItem.@ident', 'nested':'teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec','size': 1000, 'order':'term', 'display': 'Annotation - MarkUp','filter':['teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec.@ident','markup'],'type':'document'},
            {'field': 'teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec.valList.valItem.@ident', 'nested':'teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec','size': 1000, 'order':'term', 'display': 'Annotation - Other', 'filter':['teiCorpus.teiCorpus.teiHeader.encodingDesc.schemaSpec.elementSpec.@ident','other'],'type':'document'},
            {'field': 'teiCorpus.teiCorpus.teiHeader.fileDesc.publicationStmt.date.@when', 'histogram':'year','range':'date','nested':'teiCorpus.teiCorpus.teiHeader','size': 1000, 'order':'count', 'display': 'Date - Document','type':'document'},

            //{'field': 'teiCorpus.teiCorpus.teiHeader.fileDesc.extent.$', 'display': 'Size - Document','subfacets':[['teiCorpus.teiCorpus.teiHeader.fileDesc.extent.@type','words','Words'],['teiCorpus.teiCorpus.teiHeader.fileDesc.extent.@type','tokens','Tokens']]}
            {'field': 'teiCorpus.teiCorpus.teiHeader.fileDesc.extent.$', 'nested':'teiCorpus.teiCorpus.teiHeader', 'size': 10000, 'order':'reverse_term', 'display': 'Size - Document','subfacets':[['teiCorpus.teiCorpus.teiHeader.fileDesc.extent.@type','words','Words'],['teiCorpus.teiCorpus.teiHeader.fileDesc.extent.@type','tokens','Tokens']],'type':'document'}
        ],
        //restricts the response from server to the specified fields and reduces traffic
        "searchfields":{
            "partial":{
                "include":[
                    "teiCorpus.teiHeader.fileDesc.titleStmt.title.$.untouched",
                    "teiCorpus.teiHeader.fileDesc.publicationStmt.date.@when",
                    "teiCorpus.teiHeader.revisionDesc.change.@n",
                    "teiCorpus.teiHeader.encodingDesc.projectDesc.p.$",
                    "teiCorpus.teiHeader.encodingDesc.projectDesc.p.ref.@target",
                    "teiCorpus.teiCorpus.teiHeader.fileDesc.titleStmt.title.$",
                    "teiCorpus.teiCorpus.teiHeader.fileDesc.@id",
                    "teiCorpus.teiHeader.fileDesc.extent.$",
                    "teiCorpus.teiHeader.fileDesc.extent.@type"
                ]
            }
        },
        paging: {
            from: 0,
            size: 10
        }
    });

    // set up form
    $('.demo-form').submit(function(e) {
        e.preventDefault();
        var $form = $(e.target);
        var _data = {};
        $.each($form.serializeArray(), function(idx, item) {
            _data[item.name] = item.value;
        });
        $('.facet-view-here').facetview(_data);
    });
});