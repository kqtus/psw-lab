using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

using pragmatic3.Models;
using pragmatic3.Source;

namespace pragmatic3
{
    public partial class OrderSummary : System.Web.UI.Page
    {
        protected static ShopManager _shopManager;

        public ListItemCollection DeliveryTypes;

        public float AdditionalPrice { get; private set; }

        override protected void OnInit(EventArgs e)
        {
            _shopManager = ShopManager.GetInstance();

            if (DeliveryTypes == null)
                CreateDeliveryTypes();

            ComputeAdditionalPrice();
        }

        protected void Page_Load(object sender, EventArgs e)
        {   
            if (_shopManager != null)
            {
                if (_shopManager.GetBasketSize() == 0)
                {
                    NoItemsLabel.Visible = true;
                    OrderBtn.Enabled = false;
                }
                else
                {
                    NoItemsLabel.Visible = false;
                    OrderBtn.Enabled = true;
                    ItemsPanel.Visible = true;
                }
            }
        }

        protected void CreateDeliveryTypes()
        {
            DeliveryTypes = new ListItemCollection();
            DeliveryTypes.Add(new ListItem { Text = "DPD Courier - 9.99$", Value = "9,99" });
            DeliveryTypes.Add(new ListItem { Text = "Pocztex48 - 7.89$", Value = "7,89" });
            DeliveryTypes.Add(new ListItem { Text = "PocztaPolska - 4.99$", Value = "4,99" });
            DeliveryTypeDDL.DataSource = DeliveryTypes;
            DeliveryTypeDDL.DataBind();
        }

        public IQueryable<ProductModel> GetItemModels()
        {
            if (_shopManager == null)
            {
                return null;
            }

            var basketItems = _shopManager.BasketProducts;
            return basketItems.AsQueryable();
        }

        protected void DeliveryTypeDDL_SelectedIndexChanged(object sender, EventArgs e)
        {
            ComputeAdditionalPrice();
        }

        protected void ComputeAdditionalPrice()
        {
            AdditionalPrice = float.Parse(DeliveryTypes[DeliveryTypeDDL.SelectedIndex].Value);
        }

        protected void OrderBtn_Click(object sender, EventArgs e)
        {
            ShopManager.GetInstance().ClearBasket();
            Response.Redirect("~/OrderResponse.aspx");
        }
    }
}