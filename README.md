# SBFile
Basic filesystem IO library.

### Usage

```php
use Borzoni\SBFile\Components\SBFile\SBFile;

$sbFile = new SBFile('file.txt', SBFile::MODE_R);
$content = $sbFile->read();

---

$sbFile = new SBFile('file.txt', SBFile::MODE_W);
$bytes = $sbFile->write('abc');

---

$fileExists = SBFile::fileExists('file.txt');
$dirExists = SBFile::fileExists('dir/');
```
