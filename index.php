<?
$srcRoot = realpath(__DIR__ . DIRECTORY_SEPARATOR . "vendor");
$buildRoot = realpath(__DIR__);
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($srcRoot . DIRECTORY_SEPARATOR, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::LEAVES_ONLY);
echo "Building phar<br/>";
$phar = new Phar($buildRoot . DIRECTORY_SEPARATOR . 'condor.phar', 0, 'condor.phar');
$phar->buildFromIterator($iterator, $srcRoot);
$phar->addFile(__DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'index.php', 'index.php');
$phar->setStub($phar->createDefaultStub("index.php"));
exit("Build complete<br/>");


?>