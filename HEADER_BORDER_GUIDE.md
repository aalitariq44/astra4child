# دليل توثيق خط حدود الهيدر وتنسيقاته (Header Border and Style Guide)

> [!IMPORTANT]
> **تعليمات هامة للوكلاء الجدد (AI Agents):**
> إذا قمت بتعديل أو تغيير أي شيء يتعلق بتنسيقات الهيدر، خطوط الحدود (Borders)، أو الظلال (Shadows) الخاصة بالترويسة (Header)، **يجب عليك تعديل وتحديث هذا الملف فوراً** بما يتناسب مع التعديل الجديد للحفاظ على تكامل التوثيق.

---

## 1. سلوك الخط والمشكلة الأصلية (Original Behavior & Issue)

### كيف كان يعمل الخط؟
يحتوي قالب أستراChild المخصص على هيدر مخصص (Bollu Style) يتكون من جزأين رئيسيين داخل الحاوية الكبرى `<header id="masthead" class="site-header custom-bollu-header">`:
1. **الهيدر الفرعي المظلم (`.bollu-sub-header`)**: ذو خلفية داكنة `#282828`.
2. **الهيدر الرئيسي الأبيض (`.bollu-main-header`)**: ذو خلفية بيضاء ويحتوي على اللوجو وأيقونات القائمة والبحث.

### المشكلة:
1. عند الصعود إلى أعلى الصفحة (Scroll to Top)، كان يظهر خط أسود سميك وقبيح أسفل الهيدر الأبيض.
2. عند النزول لأسفل الصفحة (Scroll Down) وتفعيل وضع التثبيت (Sticky Header)، كان هذا الخط يختفي أو يتغير ليصبح رصاصياً خفيفاً.
3. **السبب الموروث:** قالب أسترا الرئيسي (Astra Theme) لديه قواعد تنسيق افتراضية تطبق حدوداً سفلية (`border-bottom`) وظلالاً ديناميكية على كلاس `.site-header` والمعرف `#masthead` عندما يكون الهيدر في حالته الطبيعية (غير المثبتة أعلى الصفحة)، ونظراً لأن ترويستنا المخصصة تستخدم نفس الكلاسات الموروثة لتوافق الووردبريس، كانت التنسيقات الافتراضية تتداخل وتفرض لوناً أسوداً سميكاً.

---

## 2. الحل والتعديلات البرمجية (Implemented Solution)

للتغلب على التداخل الموروث من القالب الرئيسي، تم تطبيق استراتيجية فصل التنسيقات كالتالي في ملف التنسيقات المخصص [custom.css](file:///c:/Users/pc/Local%20Sites/httpkizanelite/app/public/wp-content/themes/astra-child/assets/css/custom.css):

### أولاً: إلغاء كامل الحدود والظلال الموروثة (CSS Specifity Override)
تمت كتابة محددات CSS ذات أولوية وخصوصية عالية جداً لإيقاف أي حدود سفلية أو ظلال يفرضها القالب على الترويسة بجميع حالاتها (العادية، الشفافة، والمثبتة):
```css
body .site-header,
body .main-header-bar,
body .main-header-bar-wrap,
body .custom-bollu-header,
body #masthead,
body.ast-theme-transparent-header #masthead,
body.ast-theme-transparent-header .site-header,
body [class*="ast-"] .site-header,
body [class*="ast-"] #masthead,
body [class*="ast-"] .main-header-bar,
body [class*="ast-"] .main-header-bar-wrap {
    background-color: rgba(17, 17, 17, 0.95) !important;
    border: none !important;
    border-bottom: none !important;
    box-shadow: none !important;
    position: sticky;
    top: 0;
    z-index: 999;
}

.custom-bollu-header {
    display: block !important;
    width: 100%;
    background-color: var(--bollu-black);
    position: sticky;
    top: 0;
    z-index: 999;
    border: none !important;
    border-bottom: none !important;
    box-shadow: none !important;
}

/* لمنع الفجوات والحدود الافتراضية */
#masthead,
.site-header,
.custom-bollu-header,
.main-header-bar,
.main-header-bar-wrap,
.ast-main-header-wrap {
    margin-bottom: 0 !important;
    border-bottom: none !important;
}

#content,
.site-content {
    margin-top: 0 !important;
    border-top: none !important;
}
```

### ثانياً: تثبيت الحدود والظلال الناعمة على العناصر الداخلية المخصصة
بما أن حاوية الهيدر الأبيض الداخلي `.bollu-main-header` هي عنصر مخصص بالكامل ولا يستهدفه قالب أسترا بأي أكواد جافا سكريبت أو تنسيقات ديناميكية، قمت بنقل خط الحدود والظل إليه مباشرة ليظل ثابتاً وناعماً دائماً:

```css
/* الهيدر الرئيسي الأبيض */
.bollu-main-header {
    background-color: var(--bollu-white) !important;
    padding: 18px 40px;
    border-bottom: 1px solid #f2f2f2 !important; /* خط رصاصي ناعم جداً وثابت */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.02) !important; /* ظل خفيف جداً ومستقر */
}
```

وكذلك تم تحديد خط الفصل بين الهيدر العلوي المظلم والرئيسي الأبيض ليكون رصاصياً خفيفاً:
```css
/* الهيدر الفرعي العلوي */
.bollu-sub-header {
    background-color: #282828 !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important; /* خط فاصل ناعم */
    padding: 10px 40px;
}
```

---

## 3. السبب الجذري الحقيقي (Root Cause — Critical!)

المشكلة الأصلية لم تكن **border** ولا **box-shadow** على أي عنصر من عناصر الهيدر. السبب الحقيقي:

- عنصر `#page` كان يحمل خلفية سوداء (`var(--bollu-black)` = `#111111`).
- الهيدر في وضع `sticky` والمحتوى (`.site-content`) يبدأ مباشرة تحته.
- بسبب **sub-pixel rendering** في المتصفح (ارتفاعات كسرية مثل `156.578125px`)، تظهر فجوة بمقدار أقل من بكسل واحد بين حافة الهيدر وبداية المحتوى.
- هذه الفجوة الدقيقة تكشف لون خلفية `#page` السوداء وتظهر كخط أسود رفيع.

**الحل:** تم تغيير خلفية `#page` من أسود إلى أبيض:
```css
body #page {
    background-color: var(--bollu-white) !important;
}
```
الفوتر والأقسام الداكنة الأخرى كلها تتحكم بخلفياتها الخاصة بشكل مستقل، لذلك لم تتأثر.

---

## 4. إرشادات للتعديلات المستقبلية (Future Modifications Guide)

عزيزي المطور/الوكيل الجديد:
- **لا تغيّر أبداً** خلفية `body #page` إلى لون داكن — سيعيد ظهور الخط الأسود بسبب فجوة sub-pixel rendering.
- **لا تقم أبداً** بإضافة `border-bottom` أو `box-shadow` مباشرة على `.custom-bollu-header` أو `.site-header` لأنها ستتأثر وتتغير ديناميكياً مع حركات التمرير (Scrolling) الخاصة بالقالب.
- تحكم دائماً في الحدود والظلال من خلال الحاويات الفرعية الداخلية المخصصة مثل `.bollu-main-header` لضمان استقرار المظهر وثباته.
- تأكد دائماً من استخدام وسم `!important` لتخطي أي قواعد ديناميكية محقونة برمجياً.
- **تذكير:** قم بتحديث هذا الملف فوراً بعد أي تعديل يطرأ على هذه المنطقة.

