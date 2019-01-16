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
        public HashSet<ProductModel> BasketProducts { get; }

        public ShopManager()
        {
            BasketProducts = new HashSet<ProductModel>();
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
            try
            {
                using (StreamReader sr = new StreamReader("Content/items.json"))
                {
                    var prodModels = JsonConvert.DeserializeObject<List<ProductModel>>(sr.ReadToEnd());
                    return prodModels;
                }
            }
            catch (Exception e)
            {
                return new List<ProductModel>();
            }
        }

        public ProductModel GetProductModelById(int id)
        {
            var products = GetProductModels();

            var product = products.Find(model => model.Id == id);
            return product;
        }
    }
}