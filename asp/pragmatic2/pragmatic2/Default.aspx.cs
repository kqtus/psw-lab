using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class _Default : Page
{
    protected void Page_Init(object sender, EventArgs e)
    {
        timeLabel.Text = DateTime.Now.ToString("hh:mm:ss");
    }

    protected void Page_Load(object sender, EventArgs e)
    {

    }
}