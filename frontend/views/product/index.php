<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

?>
<h1> Category </h1>
<div class="category-index">
    <p>
        <?= Html::a('Create Product', ['create'],['class' => 'btn btn-success'])  ?>
    </p>
    <div class="row">
        <div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 51px;">ID</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 246px;">Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 122px;">Price</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 56px;">Sale</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 76px;">Category ID</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 150px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $item): ?>
                    <tr role="row" class="odd">
                        <td class="sorting_1">
                            <?= $item->id ?>
                        </td>
                        <td>
                            <?= $item->name?>
                        </td>
                        <td>
                            <?= number_format($item ->price) ?> VND
                        </td>
                        <td>
                            <?= $item ->sale ?>
                        </td>
                        <td>
                            <?= $item->category->name ?>
                        </td>
                        <td>
                            <span>
                            <a class="btn btn-success" href="{{route('product.edit',$item->id)}}"> Edit </a>
                                <a class="btn btn-danger" href="{{route('product.delete',$item->id)}}"> Delete </a>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
</div>