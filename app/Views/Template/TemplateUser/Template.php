<!doctype html>
<html lang="en">

<head>
    <?= $this->include('Template/TemplateUser/Header'); ?>
</head>


<body>
    <main>
        <?= $this->include('Template/TemplateUser/Navbar'); ?>
        <?= $this->renderSection('content'); ?>
    </main>
    <?= $this->include('Template/TemplateUser/Footer'); ?>
</body>

</html>