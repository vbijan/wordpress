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

1. **Database Configuration**  
   Ensure WordPress is connected to a MySQL database.  
   Edit `wp-config.php` in your WordPress root folder and configure:

```php
define('DB_NAME', 'your_database_name');       // Database name
define('DB_USER', 'your_database_user');       // Database username
define('DB_PASSWORD', 'your_database_password'); // Database password
define('DB_HOST', 'localhost');                // Usually 'localhost'
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

2. **Activate the Theme**  
   - Log in to WordPress Admin.  
   - Go to `Appearance → Themes`.  
   - Find **Splice** and click **Activate**.

3. **Configure Permalinks**  
   - Navigate to `Settings → Permalinks`.  
   - Select your preferred structure (recommended: **Post name**).  
   - Click **Save Changes** to flush rewrite rules.  
   > This ensures the Projects archive (`/projects/`) and single project URLs work correctly.

## **Custom REST API: Projects Endpoint**

Splice theme includes a custom REST API endpoint to fetch all Projects. This allows external applications or front-end JavaScript to retrieve project data in JSON format.

**Endpoint URL:**
GET https://yourwebsite.com/wp-json/splice/v1/projects
### **Request Method**

*Example Usage with cURL:**
```bash
curl -X GET http://localhost/splice/wp-json/splice/v1/projects

