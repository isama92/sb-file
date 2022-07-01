# SBFile
Basic filesystem IO library.

### Usage

```php
use Borzoni\SBFile\Components\SBFile\SBFile;

$SBFile = new SBFile('file.txt', SBFile::MODE_R);
$content = $SBFile->read();

---

$SBFile = new SBFile('file.txt', SBFile::MODE_W);
$bytes = $SBFile->write('abc');

---

$fileExists = SBFile::fileExists('file.txt');
$dirExists = SBFile::fileExists('dir/');
```
