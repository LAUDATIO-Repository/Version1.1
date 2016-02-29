<table>
    <?php
        echo $this->Html->tableHeaders(array(
            __('Product'),
            __('Stock'),
            __('Sales')
        ));
        echo $this->Html->tableCells($report);
    ?>

</table>