# TON Manager PHP Library

مكتبة PHP متقدمة لإدارة شبكة TON: إنشاء وإدارة المحافظ، معالجة المعاملات، والتكامل السهل مع TON.

---

## المتطلبات

- PHP 8.0 أو أحدث  
- تثبيت إضافة intl (عادةً عبر الأمر: `apt install php-intl`)

---

## التثبيت

### إذا كانت المكتبة منشورة على Packagist (أنصحك بذلك):

```bash
composer require ton-manager/ton-manager
```

### إذا لم تنشرها بعد على Packagist (يمكن للمستخدم إضافة مستودع GitHub):

1. أضف هذا إلى ملف `composer.json` الخاص بمشروعك:

```json
{
  "require": {
    "ton-manager/ton-manager": "dev-main"
  },
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/ToN-Service/ToN-Manager"
    }
  ],
  "minimum-stability": "dev",
  "prefer-stable": true
}
```

2. ثم نفذ:
```bash
composer require ton-manager/ton-manager:dev-main
```

---

## مثال للاستخدام

```php
require 'vendor/autoload.php';

use TonManager\Wallet;

$wallet = new Wallet(/* ... */);
// استخدم الكلاس كما تريد
```

---

## الترخيص

MIT - راجع ملف LICENSE.
