<!DOCTYPE html>
<html lang="en">

<?= $this->include('partial/header'); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= $this->include('partial/sidebar'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->include('partial/topbar'); ?>
                <!-- End of Topbar -->

                <?= $this->renderSection('content') ?>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?= $this->include('partial/footer'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    
</body>
</html>
