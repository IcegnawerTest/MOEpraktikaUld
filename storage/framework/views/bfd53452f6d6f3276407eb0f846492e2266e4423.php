<?php $__env->startSection('content'); ?>

<div class="mainProductApp">
    <?php $__currentLoopData = $user_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aU): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h4><?php echo e($aU->name); ?>:</h4>

            <?php echo Form::open(['url' => route('admin.appUpdate')]); ?>

            <?php echo Form::text('userName', $aU->name, ['class' => 'form-check-input', 'style' => 'display:none']); ?>

            <?php echo Form::text('userId', $aU->id, ['class' => 'form-check-input', 'style' => 'display:none']); ?>

    <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($apc->user->name == $aU->name): ?>
        <div class="productBlock">
            <div>
                Товар:
         <?php echo e($apc->product->name); ?>

         <?php echo e($apc->created_at); ?>

        </div>
        <td>
                <div class="form-check">
                    <?php echo Form::radio($apc->id, 'accept', false, ['class' => 'form-check-input', 'id' => 'action1']); ?>

                    <?php echo Form::label('action1', 'Принять', ['class' => 'form-check-label']); ?>

                </div>

                <div class="form-check">
                    <?php echo Form::radio($apc->id, 'refuse', false, ['class' => 'form-check-input', 'id' => 'action2']); ?>

                    <?php echo Form::label('action2', 'Отклонить', ['class' => 'form-check-label']); ?>

                </div>

                <div class="form-check">
                    <?php echo Form::radio($apc->id, 'defy', true, ['class' => 'form-check-input', 'id' => 'action3']); ?>

                    <?php echo Form::label('action3', 'Игнорировать', ['class' => 'form-check-label']); ?>

                </div>

        </td>
    </div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php echo Form::submit('Подтвердить', ['class' => 'btn btn-primary button']); ?>


            <?php echo Form::close(); ?>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('pattern.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\BakeryUld\resources\views/admin/applications.blade.php ENDPATH**/ ?>