<?php $__env->startSection('title', 'Пекарня'); ?>

<?php $__env->startSection('content'); ?>

<?php if(session('selectedType')): ?>
    <p>Выбрать категорию <?php echo e(session('selectedType')->type); ?></p>
<?php endif; ?>

<form method="post" action="<?php echo e(route('filter-product')); ?>">
    <?php echo csrf_field(); ?>
    <label for="typeSelect">Выбрать категорию:</label>
    <select id="id" name="id">
            <option value="all">Все категории</option>
        <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($typ->id); ?>" <?php echo e($typ->id == Cookie::get("productIdFilter") ? 'selected' : ''); ?>><?php echo e($typ->type); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <input type="radio" id="price" name="price" value="higher">
    <label for="vehicle1"> От высокой</label>
    <input type="radio" id="price" name="price" value="below">
    <label for="vehicle2"> От низкой</label>

    <button type="submit">Выбрать</button>
</form>


<div class="mainProduct">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="productBlock">
        <div>Наименование:
         <?php echo e($prd->name); ?>

        </div>
        <td>
            <a href="<?php echo e(route('detail', ['product' => $prd->id])); ?>">Подробнее...</a>
        </td>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('pattern.App', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\BakeryUld\resources\views/products.blade.php ENDPATH**/ ?>