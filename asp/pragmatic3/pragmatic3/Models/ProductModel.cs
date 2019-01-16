using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace pragmatic3.Models
{
    public enum CourseType
    {
        Unknown,
        Databases,
        WebDev,
        MobileDev,
        GamesDev,
        DataScience,
        CyberSec,
        General
    }

    public class ProductModel
    {
        public int Id { get; set; }
        public string ImageUrl { get; set; }
        public string Title { get; set; }
        public string Description { get; set; }
        public List<string> Authors { get; set; }
        public float Price { get; set; }
        public CourseType Type { get; set; }

        public ProductModel()
        {
            Authors = new List<string>();
            Type = CourseType.Unknown;
        }

        public override int GetHashCode()
        {
            return Id;
        }

        public override bool Equals(object obj)
        {
            return obj.GetHashCode() == GetHashCode();
        }

        public string AuthorsAsString
        {
            get
            {
                return Authors.Aggregate("", (current, next) => {
                    if (String.IsNullOrEmpty(current))
                        return next;

                    return current + ", " + next;
                });
            }
        }
    }
}