using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace pragmatic3.Models
{
    public class CommentModel
    {
        public int Id { get; set; }
        public int ProductId { get; set; }
        public string Text { get; set; }
        public string Author { get; set; }
        public DateTime Date { get; set; }

        public CommentModel()
        {
            Date = DateTime.Now;
        }
    }
}