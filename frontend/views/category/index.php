<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

?>
<h1> Category </h1>
<div class="category-index">
    <p>
        <?= Html::a('Create Category', ['create'],['class' => 'btn btn-success'])  ?>
    </p>
    
        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 201px;">ID</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 246px;">Name</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 126px;">Action</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach($categories as $cate): ?>
                <tr role="row" class="odd">
                    <td>
                        <?= $cate->id ?>
                    </td>
                    <td>
                        <?= $cate->name ?>
                    </td>
                    <td>
                    <span>
                        <?= Html::a('Update', ['update','id'=>$cate->id],['class' => 'btn btn-success'])  ?>
                        <?= Html::a('Delete', ['delete','id'=>$cate->id],['class' => 'btn btn-danger'])  ?>
                    </span>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>