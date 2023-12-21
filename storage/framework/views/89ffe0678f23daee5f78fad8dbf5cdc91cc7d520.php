<?php $__env->startSection('content'); ?>

<div class="mainProduct">
    <form action="<?php echo e(route('admin.addPost')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <input type="text" name="name" placeholder="Имя" required>
        <input type="text" name="type" placeholder="Тип" required>
        <input type="text" name="img" placeholder="Ссылка на картинку" required>
        <textarea name="description" cols="100" rows="10" placeholder="Описание" required></textarea>
        <input type="text" name="composition" placeholder="Состав" required>
        <input type="number" name="price" placeholder="Цена" required>
        <button>Добавить в корзину</button>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('pattern.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\BakeryUld\resources\views//admin/add.blade.php ENDPATH**/ ?>