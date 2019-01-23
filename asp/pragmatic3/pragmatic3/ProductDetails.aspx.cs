using pragmatic3.Source;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

using pragmatic3.Models;

namespace pragmatic3
{
    public partial class ProductDetails : System.Web.UI.Page
    {
        private ShopManager _shopManager;
        private ProductModel _productModel;

        protected override void OnInit(EventArgs e)
        {
            if (_shopManager == null)
                _shopManager = ShopManager.GetInstance();
        }

        protected int LatestProductId
        {
            get
            {
                var productId = Session["product_id"];

                if (productId == null)
                    return 1;

                return int.Parse(productId.ToString());
            }
        }

        protected void Page_Load(object sender, EventArgs e)
        {
            Setup(LatestProductId);
            UpdateCommentsPanel();

            var loggedIn = Session["logged_in"];
            bool showInputPanel = loggedIn != null && (bool)loggedIn == true;

            CommentInpPanel.Visible = showInputPanel;
            CommentNoInpPanel.Visible = !showInputPanel;
        }

        protected void Setup(int productId)
        {
            _productModel = _shopManager.GetProductModelById(productId);

            if (_productModel != null)
            {
                ProductImage.ImageUrl = _productModel.ImageUrl;
                ProductTitle.Text = _productModel.Title;
                ProductDescription.Text = _productModel.Description;
                ProductAuthors.Text = _productModel.AuthorsAsString;
                ProductPrice.Text = _productModel.Price.ToString();
            }
        }

        // The return type can be changed to IEnumerable, however to support
        // paging and sorting, the following parameters must be added:
        //     int maximumRows
        //     int startRowIndex
        //     out int totalRowCount
        //     string sortByExpression
        public IQueryable CommentsPanel_GetData()
        {
            return _shopManager.GetCommentModelsForProduct(LatestProductId).AsQueryable();
        }

        void UpdateCommentsPanel()
        {
            CommentsPanel.DataSource = CommentsPanel_GetData();
            CommentsPanel.DataBind();
        }

        protected void CommentBtn_Click(object sender, EventArgs e)
        {
            var comment = new CommentModel();
            comment.Text = CommentInput.Text;
            comment.Author = "Unknown";
            comment.ProductId = LatestProductId;

            var user = Session["username"];
            if (user != null)
            {
                comment.Author = user.ToString();
            }

            _shopManager.AddComment(comment);
            CommentInput.Text = "";
            UpdateCommentsPanel();
        }
    }
}