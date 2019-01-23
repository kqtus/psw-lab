using System;
using System.Collections.Generic;
using System.Data.SQLite;
using System.IO;
using System.Linq;
using System.Web;

using pragmatic3.Models;

namespace pragmatic3.Source
{
    public class DatabaseAdapter
    {
        protected SQLiteConnection _connection = null;
        protected string _dbPath = @"D:\prshop.sqlite";

        protected static DatabaseAdapter _instance;

        public static DatabaseAdapter GetInstance()
        {
            if (_instance == null)
            {
                _instance = new DatabaseAdapter();
                _instance.Init();
            }

            return _instance;
        }

        public bool Init()
        {
            _connection = new SQLiteConnection();

            if (File.Exists(_dbPath))
            {
                _connection.ConnectionString = $"DataSource={_dbPath};Version=3;";
                _connection.Open();

                return true;
            }

            return false;
        }

        public List<ProductModel> GetProducts()
        {
            List<ProductModel> productModels = new List<ProductModel>();
            string cmd = "SELECT * FROM Products";

            SQLiteCommand sqcmd = new SQLiteCommand(cmd, _connection);
            SQLiteDataReader dr = sqcmd.ExecuteReader();

            while (dr.Read())
            {
                ProductModel pm = new ProductModel();

                pm.Id = int.Parse(dr["Id"].ToString());
                pm.ImageUrl = dr["ImageUrl"].ToString();
                pm.Title = dr["Title"].ToString();
                pm.Description = dr["Description"].ToString();
                pm.Authors = dr["Authors"].ToString().Split(',').ToList();
                pm.Price = float.Parse(dr["Price"].ToString());
                pm.Type = (CourseType)int.Parse(dr["Type"].ToString());

                productModels.Add(pm);
            }

            return productModels;
        }

        public List<CommentModel> GetComments()
        {
            return GetComments("SELECT * FROM Comments");
        }

        public List<CommentModel> GetComments(int productId)
        {
            return GetComments($"SELECT * FROM Comments WHERE ProductId='{productId}'");
        }

        protected List<CommentModel> GetComments(string query)
        {
            var comments = new List<CommentModel>();

            SQLiteCommand sqcmd = new SQLiteCommand(query, _connection);
            SQLiteDataReader dr = sqcmd.ExecuteReader();

            while (dr.Read())
            {
                CommentModel cm = new CommentModel();

                cm.Id = int.Parse(dr["Id"].ToString());
                cm.ProductId = int.Parse(dr["ProductId"].ToString());
                cm.Text = dr["Text"].ToString();
                cm.Author = dr["Author"].ToString();
                cm.Date = DateTime.Parse(dr["Date"].ToString());

                comments.Add(cm);
            }

            return comments;
        }

        public bool AddComment(CommentModel comment)
        {
            string cmd = String.Format(
                "INSERT INTO Comments VALUES(null, {0}, '{1}', '{2}', '{3}')",
                comment.ProductId,
                comment.Text,
                comment.Author,
                comment.Date.ToString()
            );

            var sqcmd = new SQLiteCommand(cmd, _connection);
            return sqcmd.ExecuteNonQuery() > 0;
        }

        public bool ValidateUser(string login, string password)
        {
            string cmd = $"SELECT COUNT(Id) FROM Users WHERE Name='{login}' AND Password='{password}'";

            var sqcmd = new SQLiteCommand(cmd, _connection);
            int rowCount = Convert.ToInt32(sqcmd.ExecuteScalar());

            return rowCount > 0;
        }
    }
}