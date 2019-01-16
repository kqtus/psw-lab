using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

using pragmatic3.Models;
using pragmatic3.Controls;
using pragmatic3.Source;

namespace pragmatic3
{
    public partial class Shop : System.Web.UI.Page
    {
        protected static ShopManager shopManager;

        override protected void OnInit(EventArgs e)
        {
            shopManager = ShopManager.GetInstance();

            var productModels = shopManager.GetProductModels();
            var productViews = CreateProductViews(productModels);

            foreach (var view in productViews)
            {
                ItemsPanel.Controls.Add(view);
            }
        }

        protected void Page_Load(object sender, EventArgs e)
        {
            UpdateBasketInfo();
        }

        protected List<ShopListItem> CreateProductViews(List<ProductModel> models)
        {
            var views = new List<ShopListItem>();

            foreach (var model in models)
            {
                var view = LoadControl("~/Controls/ShopListItem.ascx") as ShopListItem;
                view.OnAddToBasketEvent += OnAddToBasket;
                view.Model = model;
                views.Add(view);
            }

            return views;
        }

        protected void OnAddToBasket(object sender, EventArgs args)
        {
            var item = sender as ShopListItem;
            
            shopManager.AddToBasket(item.Model);
            UpdateBasketInfo();
        }

        protected void UpdateBasketInfo()
        {
            BasketItemsCountLabel.Text = shopManager.GetBasketSize().ToString();
            BasketPriceLabel.Text = shopManager.GetBasketPrice().ToString();
        }

        protected void EmptyBtn_Click(object sender, EventArgs e)
        {
            shopManager.ClearBasket();
            UpdateBasketInfo();
        }

        protected void CheckoutBtn_Click(object sender, EventArgs e)
        {

        }

        protected void RadioList_SelectedIndexChanged(object sender, EventArgs e)
        {
            int index = RadioList.SelectedIndex;

            foreach (var control in ItemsPanel.Controls)
            {
                var item = control as ShopListItem;
                item.Visible = (int)item.Model.Type == index || index == 0;
            }
        }
    }
}