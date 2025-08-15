# Splice WordPress Theme

Splice is a custom WordPress theme designed for showcasing projects in a responsive Bootstrap grid. It includes a custom post type for Projects, breadcrumbs, date filtering, and full support for featured images and post excerpts.

---
## **Features**

- Responsive design using Bootstrap 5
- Custom Post Type: **Projects**
  - Supports title, editor, thumbnail, excerpt, comments, and custom fields
  - Filter projects by **Start Date** and **End Date**
  - Archive page with pagination
- Breadcrumb navigation
- 404 Not Found page template
- Search results template
- Custom post formats: aside, audio, chat, gallery, image, quote, status, link, video
- Automatic feed links
- Navigation menu support
- Featured images with custom sizes: large, medium, small

---
## **Installation**

1. **Clone the repository** into your WordPress `wp-content/themes` directory:

```bash
git clone https://github.com/vbijan/wordpress.git
```
## **Database Configuration**

Ensure WordPress is connected to a MySQL database.  
Edit `wp-config.php` in your WordPress root folder and configure:

```php
define('DB_NAME', 'your_database_name');         // Database name
define('DB_USER', 'your_database_user');         // Database username
define('DB_PASSWORD', 'your_database_password'); // Database password
define('DB_HOST', 'localhost');                  // Usually 'localhost'
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
```
## **Activate the Theme**

1. Log in to WordPress Admin.  
2. Go to `Appearance → Themes`.  
3. Find **Splice** and click **Activate**.

---

## **Configure Permalinks**

1. Navigate to `Settings → Permalinks`.  
2. Select your preferred structure (recommended: **Post name**).  
3. Click **Save Changes** to flush rewrite rules.  

> This ensures the Projects archive (`/projects/`) and single project URLs work correctly.

---

## **Create Projects**

1. In WordPress Admin, go to `Projects → Add New`.  
2. Add the following for each project:
   - **Title** – Project name  
   - **Content** – Description or details  
   - **Featured Image** – Displayed in archive and single pages  
   - **Start Date** *(optional)* – Add a custom field `start_date` in `YYYY-MM-DD` format for filtering  
3. Publish the project.  

> After adding projects, visit `/projects/` to see the archive page with Bootstrap grid and optional date filtering.

---

## **Custom REST API: Projects Endpoint**

Splice theme includes a custom REST API endpoint to fetch all Projects.

**Endpoint URL:**
```bash
    GET https://yourwebsite.com/wp-json/splice/v1/projects
```
**Example Usage with cURL:**

```bash
    curl -X GET https://yourwebsite.com/wp-json/splice/v1/projects
```

## Login Credentials
```bash
  username : splice
  password : splice2@25
```