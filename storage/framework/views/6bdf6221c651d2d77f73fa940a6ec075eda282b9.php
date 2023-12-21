<?php $__env->startSection('content'); ?>
<div class='flexFormAdd'>
<div class="mainProductAdd">
    <form action="<?php echo e(route('admin.addPost')); ?>" method="post">
        <H4>Добавление товара</H4>
        <?php echo csrf_field(); ?>
        <input type="text" name="name" placeholder="Имя нового товара" required>
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
			!<?php echo e($message); ?>

		<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <select id="type" name="type">
            <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($typ->id); ?>"><?php echo e($typ->type); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <input type="text" name="img" placeholder="Ссылка на картинку" required>
        <?php $__errorArgs = ['img'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
			!<?php echo e($message); ?>

		<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <textarea name="description" cols="100" rows="10" placeholder="Описание" required></textarea>
        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
			!<?php echo e($message); ?>

		<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <input type="text" name="composition" placeholder="Состав" required>
        <?php $__errorArgs = ['composition'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
			!<?php echo e($message); ?>

		<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <input type="number" name="price" placeholder="Цена" required>
        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
			!<?php echo e($message); ?>

		<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <button>Добавить</button>
    </form>

    <form action="<?php echo e(route('admin.addTypePost')); ?>" method="post">
    <H4>Добавление категории</H4>
        <?php echo csrf_field(); ?>
        <input type="text" name="type" placeholder="Имя нового типа" required>
        <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
			!<?php echo e($message); ?>

		<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <button>Добавить</button>
    </form>
    <form action="<?php echo e(route('admin.deleteTypePost')); ?>" method="post">
    <H4>Удаление категории</H4>
        <?php echo csrf_field(); ?>
        <select id="type" name="type">
            <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($typ->id); ?>"><?php echo e($typ->type); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php echo method_field('DELETE'); ?>
        <button>Удалить</button>
    </form>
    <form action="<?php echo e(route('admin.updateTypePost')); ?>" method="post">
    <H4>Редактирование категории</H4>
        <?php echo csrf_field(); ?>
        <select id="type" name="type">
            <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($typ->id); ?>"><?php echo e($typ->type); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <input type="text" name="typeName" placeholder="Имя нового типа" required>
        <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
			!<?php echo e($message); ?>

		<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <button>Редактировать</button>
    </form>
    <?php echo e(session("error")); ?>

    <?php echo e(session('success')); ?>

</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pattern.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\BakeryUld\resources\views/admin/add.blade.php ENDPATH**/ ?>