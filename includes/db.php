<?php
declare(strict_types=1);

class Database {
    private $db;

    public function __construct() {
        $this->db = new SQLite3('kodoninja.db');
        $this->createTables();
    }

    private function createTables(): void {
        $this->db->exec('
            CREATE TABLE IF NOT EXISTS blogs (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title TEXT NOT NULL,
                excerpt TEXT NOT NULL,
                content TEXT NOT NULL,
                author TEXT NOT NULL,
                views INTEGER DEFAULT 0,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                image_path TEXT
            )
        ');

        $this->db->exec('
            CREATE TABLE IF NOT EXISTS blog_likes (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                blog_id INTEGER,
                user_id TEXT,
                FOREIGN KEY (blog_id) REFERENCES blogs(id)
            )
        ');

        $this->db->exec('
            CREATE TABLE IF NOT EXISTS blog_comments (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                blog_id INTEGER,
                user_id TEXT,
                comment TEXT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (blog_id) REFERENCES blogs(id)
            )
        ');

        // Seed some initial data if the table is empty
        $result = $this->db->querySingle('SELECT COUNT(*) FROM blogs');
        if ($result == 0) {
            $this->db->exec("
                INSERT INTO blogs (title, excerpt, content, author, views, image_path) VALUES
                ('My Mindfulness Journey: 5 Key Lessons', 'Discover how mindfulness transformed my daily life...', 'Full content of mindfulness blog...', 'KodoSage', 12000, 'assets/images/blogs/mindfulness.jpg'),
                ('Building Resilience in Tough Times', 'Learn practical strategies to bounce back stronger...', 'Full content of resilience blog...', 'NinjaMaster', 8000, 'assets/images/blogs/resilience.jpg'),
                ('10 Productivity Hacks for Ninjas', 'Boost your productivity with these ninja-inspired techniques...', 'Full content of productivity blog...', 'KodoWise', 6000, 'assets/images/blogs/productivity.jpg'),
                ('Self-Care Routine for a Balanced Life', 'Prioritize yourself with this simple yet effective routine...', 'Full content of self-care blog...', 'KodoStar', 5000, 'assets/images/blogs/selfcare.jpg'),
                ('Overcoming Procrastination: A Ninja’s Guide', 'Practical tips to beat procrastination...', 'Full content of procrastination blog...', 'KodoSage', 3000, NULL),
                ('The Power of Gratitude in Daily Life', 'How gratitude can transform your mindset...', 'Full content of gratitude blog...', 'NinjaMaster', 2500, NULL),
                ('Setting Goals That Stick', 'Learn how to set achievable goals...', 'Full content of goals blog...', 'KodoWise', 2000, NULL),
                ('Meditations for Beginners', 'A beginner’s guide to meditation...', 'Full content of meditation blog...', 'KodoStar', 1800, NULL)
            ");
        }
    }

    public function getMostViewedBlog() {
        return $this->db->querySingle('SELECT * FROM blogs ORDER BY views DESC LIMIT 1', true);
    }

    public function getTrendingBlogs() {
        return $this->db->query('SELECT * FROM blogs ORDER BY views DESC LIMIT 3 OFFSET 1');
    }

    public function getAllBlogs($offset = 0, $limit = 4) {
        $stmt = $this->db->prepare('SELECT * FROM blogs ORDER BY created_at DESC LIMIT :limit OFFSET :offset');
        $stmt->bindValue(':limit', $limit, SQLITE3_INTEGER);
        $stmt->bindValue(':offset', $offset, SQLITE3_INTEGER);
        return $stmt->execute();
    }

    public function getBlogById($id) {
        $stmt = $this->db->prepare('SELECT * FROM blogs WHERE id = :id');
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        return $stmt->execute()->fetchArray(SQLITE3_ASSOC);
    }

    public function incrementBlogViews($id) {
        $stmt = $this->db->prepare('UPDATE blogs SET views = views + 1 WHERE id = :id');
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
    }

    public function likeBlog($blogId, $userId) {
        $stmt = $this->db->prepare('INSERT INTO blog_likes (blog_id, user_id) VALUES (:blog_id, :user_id)');
        $stmt->bindValue(':blog_id', $blogId, SQLITE3_INTEGER);
        $stmt->bindValue(':user_id', $userId, SQLITE3_TEXT);
        $stmt->execute();
    }

    public function getLikesCount($blogId) {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM blog_likes WHERE blog_id = :blog_id');
        $stmt->bindValue(':blog_id', $blogId, SQLITE3_INTEGER);
        return $stmt->execute()->fetchArray(SQLITE3_NUM)[0];
    }

    public function addComment($blogId, $userId, $comment) {
        $stmt = $this->db->prepare('INSERT INTO blog_comments (blog_id, user_id, comment) VALUES (:blog_id, :user_id, :comment)');
        $stmt->bindValue(':blog_id', $blogId, SQLITE3_INTEGER);
        $stmt->bindValue(':user_id', $userId, SQLITE3_TEXT);
        $stmt->bindValue(':comment', $comment, SQLITE3_TEXT);
        $stmt->execute();
    }

    public function getComments($blogId) {
        $stmt = $this->db->prepare('SELECT * FROM blog_comments WHERE blog_id = :blog_id ORDER BY created_at DESC');
        $stmt->bindValue(':blog_id', $blogId, SQLITE3_INTEGER);
        return $stmt->execute();
    }
}

$db = new Database();
