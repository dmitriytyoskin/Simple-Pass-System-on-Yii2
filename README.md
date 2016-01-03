# Simple-Pass-System-on-Yii2
This simple web application was developed for learning purpose using Yii2 php-framework.
The idea of this app was taken from one of the biggest manufacturing plants of Volgograd region of Russian Federation,
where the author worked as an Import Purchasing Manager for some period of time. The app is used as gating system to control coming
trucks and visitors(technican specialists of contract companies, sales representatives etc.).
The app is used by different type of users divided by four groups(using RBAC system):
1. Engineers(purchasing managers): can creat permits for visitors and coming trucks with puchased goods.
2. Supervisers(head of purchasing departments): use their section of app to confirm the information and permit status.
3. Dispatchers of the plant: they can see confirmed permits in their section of app and control documents and truck numbers during their passing through main gates of the plant. After passing they put the permit in archive section of app.
4. Administrator of the app - head of gating system of the company : can add and delete userser and assign roles for them.

The app can use Sqlite of Mysql database for data starage and uses simple bootstrap interface as GUI. 