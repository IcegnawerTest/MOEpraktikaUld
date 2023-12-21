<?php $__env->startSection('content'); ?>

<div class="blockFlexAdmin">
<div class="mainProductAdmin">
    <a href="<?php echo e(route('admin.add')); ?>" style='width: 80px'><img style='width: 80px' src="/image/Кнопка.png" alt="Нет"></a>


    <?php if(session('selectedType')): ?>
    <p>Выбрать категорию <?php echo e(session('selectedType')->type); ?></p>
    <?php endif; ?>

    <form method="post" action="<?php echo e(route('admin.filter.product')); ?>">
        <?php echo csrf_field(); ?>
        <label for="typeSelect">Выбрать категорию:</label>
        <select id="id" name="id">
                <option value="all">Все категории</option>
            <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($typ->id); ?>"><?php echo e($typ->type); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <button type="submit">Использовать фильтры</button>
    </form>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="productBlock">
        <div>
            Наименование:
         <?php echo e($prd->name); ?>

        </div>
        <td>
            <a href="<?php echo e(route('admin.update', ['product' => $prd->id])); ?>"><button>Редактировать</button></a>
        </td>
        <td>
            <form action="<?php echo e(route('admin.remove', $prd->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <input type="hidden" name="id" value="<?php echo e($prd->id); ?>">
                <button type="submit">Удалить</button>
            </form>
        </td>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <div class="paginate"><?php echo e($products->withQueryString()->links('pagination::bootstrap-5')); ?></div>
    <?php echo e(session("error")); ?>

    <?php echo e(session('success')); ?>

</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pattern.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\OSPanel\domains\BakeryUld\resources\views/admin/product.blade.php ENDPATH**/ ?>