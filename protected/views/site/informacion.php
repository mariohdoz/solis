<section class="cd-gallery">
    <ul>
        <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_vista',
        )); ?>
    </ul>
</section>