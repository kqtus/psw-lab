using pragmatic3.Source;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace pragmatic3
{
    public partial class ProductDetails : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            Setup(Session["product_id"]?.ToString());
        }

        protected void Setup(string productId)
        {
            if (String.IsNullOrEmpty(productId))
            {
                return;
            }

            var shopManager = ShopManager.GetInstance();
            var prod = shopManager.GetProductModelById(int.Parse(productId));

            if (prod != null)
            {
                ProductImage.ImageUrl = prod.ImageUrl;
                ProductTitle.Text = prod.Title;
                ProductDescription.Text = prod.Description;
                ProductAuthors.Text = prod.AuthorsAsString;
            }
        }
    }
}