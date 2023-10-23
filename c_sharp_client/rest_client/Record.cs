using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace rest_client
{

    internal class Data
    {
        public List<Record> data { get; set; }
    }
    internal class Record
    {
        public string id { get; set; }
        public string voornaam { get; set; }
        public string achternaam { get; set; }
        public string email { get; set; }
        public string geboortedatum { get; set; }
    }
}
