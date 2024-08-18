

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Blogs</h1>
    <a href="<?php echo e(route('blogs.create')); ?>" class="btn btn-primary">Create New Blog</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($blog->id); ?></td>
                <td><?php echo e($blog->title); ?></td>
                <td>
                    <a href="<?php echo e(route('blogs.edit', $blog->id)); ?>" class="btn btn-warning">Edit</a>
                    <form action="<?php echo e(route('blogs.destroy', $blog->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /htdocs/sogbina/resources/views/admin/blog/index.blade.php ENDPATH**/ ?>