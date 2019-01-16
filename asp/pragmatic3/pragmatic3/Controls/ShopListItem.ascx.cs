using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

using pragmatic3.Models;

namespace pragmatic3.Controls
{
    public partial class ShopListItem : System.Web.UI.UserControl
    {
        private ProductModel _model;
        public ProductModel Model
        {
            get
            {
                return _model;
            }
            set
            {
                this._model = value;
                OnModelSet();
            }
        }

        public delegate void PressHandler(object sencer, EventArgs e);

        public event PressHandler OnAddToBasketEvent;

        protected void Page_Load(object sender, EventArgs e)
        {
            
        }

        protected void OnModelSet()
        {
            productImage.ImageUrl = Model.ImageUrl;
            ProductName.Text = Model.Title;
            ProductDescription.Text = Model.Description;
            ProductPrice.Text = Model.Price.ToString() + " $";
            ProductType.Text = Model.Type.ToString();
            Author.Text = Model.AuthorsAsString;

            ProductType.CssClass += " item-cat" + ((int)Model.Type).ToString(); 
        }

        protected void AddToBasketBtn_Click(object sender, EventArgs e)
        {
            OnAddToBasketEvent(this, e);
        }

        protected void PreviewBtn_Click(object sender, EventArgs e)
        {
            Session["product_id"] = Model.Id;
            Response.Redirect("~/ProductDetails.aspx");
        }
    }
}