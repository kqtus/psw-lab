using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Web;
using System.Web.Script.Serialization;
using Newtonsoft.Json;
using pragmatic3.Models;

namespace pragmatic3.Source
{
    public class ShopManager
    {
        private static string itemsPath = "Content/items.json";
        private static string commentsPath = "Content/comments.json";

        public HashSet<ProductModel> BasketProducts { get; }

        protected DatabaseAdapter _dbAdapter;

        public ShopManager()
        {
            BasketProducts = new HashSet<ProductModel>();
            _dbAdapter = DatabaseAdapter.GetInstance();
        }

        protected static ShopManager _instance;
        
        public static ShopManager GetInstance()
        {
            if (_instance == null)
            {
                _instance = new ShopManager();
            }

            return _instance;
        }

        public void AddToBasket(ProductModel product)
        {
            BasketProducts.Add(product);
        }

        public int GetBasketSize()
        {
            return BasketProducts.Count;
        }

        public decimal GetBasketPrice()
        {
            if (GetBasketSize() > 0)
                return BasketProducts
                    .Select(item => item.Price)
                    .Aggregate(0M, (price1, price2) => (decimal)price1 + (decimal)price2);

            return 0M;
        }

        public void ClearBasket()
        {
            BasketProducts.Clear();
        }

        public List<ProductModel> GetProductModels()
        {
            /*
            try
            {
                using (StreamReader sr = new StreamReader(itemsPath))
                {
                    var prodModels = JsonConvert.DeserializeObject<List<ProductModel>>(sr.ReadToEnd());
                    return prodModels;
                }
            }
            catch (Exception e)
            {
                return new List<ProductModel>();
            }
            */
            return _dbAdapter.GetProducts();
        }

        public ProductModel GetProductModelById(int id)
        {
            var products = GetProductModels();

            var product = products.Find(model => model.Id == id);
            return product;
        }

        public List<CommentModel> GetCommentModels()
        {
            /*
            try
            {
                using (StreamReader sr = new StreamReader(commentsPath))
                {
                    var commentModels = JsonConvert.DeserializeObject<List<CommentModel>>(sr.ReadToEnd());
                    return commentModels;
                }
            }
            catch (Exception e)
            {
                return new List<CommentModel>();
            }*/

            return _dbAdapter.GetComments();
        }

        public List<CommentModel> GetCommentModelsForProduct(int productId)
        {
            //return GetCommentModels().Where(x => x.ProductId == productId).ToList();

            return _dbAdapter.GetComments(productId);
        }

        public void AddComment(CommentModel comment)
        {
            /*
            var comments = GetCommentModels();
            comments.Add(comment);

            try
            {
                using (StreamWriter sw = new StreamWriter(commentsPath))
                {
                    var json = JsonConvert.SerializeObject(comments);
                    sw.Write(json);
                }
            }
            catch (Exception e)
            {
            }
            */
            _dbAdapter.AddComment(comment);
        }
    }
}