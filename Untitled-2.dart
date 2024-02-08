
import 'package:flutter/material.dart';
import 'package:nb_utils/nb_utils.dart';
import 'package:qatarmap/utils/images.dart';
import 'package:carousel_slider/carousel_slider.dart';
import 'package:flutter/cupertino.dart';
import 'package:url_launcher/url_launcher.dart';
import '../category_properties_screen.dart';
import '../filterscreen.dart';
import '../models/adslider_model.dart';
import '../services/api_service.dart';

class HomeFargment extends StatefulWidget {
  const HomeFargment({super.key});

  @override
  State<HomeFargment> createState() => _HomeFargmentState();
}

class _HomeFargmentState extends State<HomeFargment> {

  late List<Propertymodel> _propertyList;

  List<AdSlider> _adSliderList = [];

  // List imageList = [];

  int _current = 0;

  final CarouselController _controller = CarouselController();

  final ApiService _apiService = ApiService();

  @override
  void initState() {
    super.initState();
    // _propertyList = propertyList();
    fetchAdSliders();
  }

  void fetchAdSliders() async {
    try {
      _adSliderList = await _apiService.showSliders();
      setState(() {});
    } catch (e) {
      print("Error fetching ad sliders: $e");
      // Optionally, handle the error by showing a message or a placeholder
    }
  }


  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        elevation: 0,
        toolbarHeight: 50,
        backgroundColor: Colors.white,
        title: Padding(
          padding: const EdgeInsets.only(bottom: 8.0),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              Text("صباح الخير 👋", style: secondaryTextStyle()),
              const SizedBox(height: 5),
              Text("استاذ.احمد علي", style: boldTextStyle()),
            ],
          ),
        ),
        leading: GestureDetector(
          child: Padding(
            padding: EdgeInsets.only(top: 8, right: 8, bottom: 8, left: 16),
            child: Image.asset(img_person, fit: BoxFit.cover).cornerRadiusWithClipRRect(60),
          ),
          onTap: () {
            // Navigator.push(
            //   context,
            //   MaterialPageRoute(builder: (context) => ProfileScreen()),
            // );
          },
        ),
        // actions: [
        //   Padding(
        //     padding: const EdgeInsetsDirectional.only(end: 8),
        //     child: IconButton(
        //       icon: Icon(Icons.notifications_none_rounded, size: 22, color: context.iconColor),
        //       onPressed: () {
        //         // Navigator.push(
        //         //   context,
        //         //   MaterialPageRoute(builder: (context) => NotificationScreen()),
        //         // );
        //       },
        //     ),
        //   ),
        //   // IconButton(
        //   //   icon: Icon(Icons.search, size: 22, color: context.iconColor),
        //   //   onPressed: () {
        //   //     // Navigator.push(
        //   //     //   context,
        //   //     //   MaterialPageRoute(builder: (context) => WishListScreen()),
        //   //     // );
        //   //   },
        //   // )
        // ],
      ),

      body: SingleChildScrollView(
        child: Padding(
          padding: const EdgeInsets.all(8.0),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: <Widget>[

              ///slider
              // Column(children: [
              //   CarouselSlider(
              //     items: imageSliders,
              //     carouselController: _controller,
              //     options: CarouselOptions(
              //         autoPlay: true,
              //         enlargeCenterPage: true,
              //         aspectRatio: 2.0,
              //         onPageChanged: (index, reason) {
              //           setState(() {
              //             _current = index;
              //           }
              //           );
              //         }),
              //   ),
              //   Row(
              //     mainAxisAlignment: MainAxisAlignment.center,
              //     children: imgList.asMap().entries.map((entry) {
              //       return GestureDetector(
              //         onTap: () => _controller.animateToPage(entry.key),
              //         child: Container(
              //           width: 12.0,
              //           height: 12.0,
              //           margin: EdgeInsets.symmetric(vertical: 8.0, horizontal: 4.0),
              //           decoration: BoxDecoration(
              //               shape: BoxShape.circle,
              //               color: (Theme.of(context).brightness == Brightness.dark
              //                   ? Colors.white
              //                   : Colors.black)
              //                   .withOpacity(_current == entry.key ? 0.9 : 0.4)),
              //         ),
              //       );
              //     }).toList(),
              //   ),
              // ]),

              _buildAdSlider(),
              16.height,

              SingleChildScrollView(
                child:GridView.builder(
                    padding: EdgeInsets.only(bottom: 16, top: 8),
                    primary: false,
                    shrinkWrap: true,
                    itemCount: propertyModelList.length,
                    gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(
                      crossAxisCount: 2,
                      mainAxisSpacing: 2,
                      crossAxisSpacing: 3,
                      childAspectRatio: 0.85,
                    ),
                    itemBuilder: (BuildContext Context, int index) {
                      return Padding(
                        padding: EdgeInsets.all(8.0),
                        child: GestureDetector(
                          onTap: () {
                            // Corrected reference to the propertyModelList for the current index
                            int? categoryId = determineCategoryId(propertyModelList[index].categoryTitle);

                            if (categoryId != null && categoryId != 0) {
                              Navigator.push(
                                context,
                                MaterialPageRoute(
                                  builder: (context) => CategoryPropertiesScreen(categoryId: categoryId),
                                ),
                              );
                            } else {
                              // Handle the scenario when categoryId is null or invalid.
                              // For example, show a dialog or a toast message.
                              print("Invalid category ID");
                            }
                          },
                          child: Container(
                            padding: EdgeInsets.all(16),
                            width: 220,
                            decoration: BoxDecoration(color: Colors.grey[100], borderRadius: BorderRadius.circular(20)),
                            child: Column(
                              children: [
                                Container(
                                  decoration: BoxDecoration(
                                    color: propertyModelList[index].backgroundcolor,
                                    borderRadius: BorderRadius.circular(15),
                                  ),
                                  child: Center(
                                    child: Padding(
                                      padding: EdgeInsets.all(20.0),
                                      child: Image.asset(
                                        propertyModelList[index].imagePath,
                                        width: double.infinity,
                                      ),
                                    ),
                                  ),
                                ),
                                SizedBox(height: 16),
                                Row(
                                  mainAxisAlignment: MainAxisAlignment.center,
                                  children: [
                                    Column(
                                      crossAxisAlignment: CrossAxisAlignment.start,
                                      children: [
                                        Text(
                                          propertyModelList[index].categoryTitle,
                                          style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
                                        ),
                                      ],
                                    ),
                                  ],
                                )
                              ],
                            ),
                          ),
                        ),
                      );
                    }),),

              ///properties
              Padding(
                padding: EdgeInsetsDirectional.only(start: 8,bottom: 10),
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Text('عقارات',
                      style: TextStyle(
                        fontWeight: FontWeight.bold,
                        fontSize: 26,
                      ),
                    ),
                    Text('365 اعلان',
                      style: TextStyle(
                          fontWeight: FontWeight.w500,
                          fontSize: 18,
                          color: Colors.red
                      ),
                    ),

                  ],
                ),
              ),
              // GridView.builder(
              //   scrollDirection: Axis.vertical,
              //   itemCount: _propertyList.length,
              //   physics: NeverScrollableScrollPhysics(),
              //   shrinkWrap: true,
              //   itemBuilder: (context, index) {
              //     return Container(
              //       margin: EdgeInsets.only(left: 6, right: 6, top: 6, bottom: 6),
              //       decoration: boxDecorationWithShadow(
              //         backgroundColor: context.cardColor,
              //         boxShadow: defaultBoxShadow(),
              //         borderRadius: BorderRadius.circular(12),
              //       ),
              //       child: Column(
              //         mainAxisAlignment: MainAxisAlignment.center,
              //         children: <Widget>[
              //           Image.asset(_propertyList[index].img!, height: 35, width: 35, color: _propertyList[index].color),
              //           15.height,
              //           Text(
              //             _propertyList[index].categoryTitle!,
              //             style: primaryTextStyle(),
              //             textAlign: TextAlign.center,
              //             maxLines: 2,
              //           ),
              //         ],
              //       ),
              //     ).onTap(() {
              //       int? categoryId = determineCategoryId(_propertyList[index].categoryTitle);
              //       if (categoryId != null) {
              //         Navigator.push(
              //           context,
              //           MaterialPageRoute(
              //             builder: (context) => CategoryPropertiesScreen(categoryId: categoryId),
              //           ),
              //         );
              //       } else {
              //         // Handle the scenario when categoryId is null.
              //       }
              //     });
              //
              //   },
              //   gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(
              //     crossAxisCount: 3,
              //     childAspectRatio: 0.8,
              //     mainAxisSpacing: 16,
              //     crossAxisSpacing: 16,
              //   ),
              // ),
            ],
          ),
        ),
      ),

    );


  }

  Widget _buildAdSlider() {
    if (_adSliderList.isEmpty) {
      return CircularProgressIndicator(); // or a placeholder widget
    }

    List<Widget> imageSliders = _adSliderList.map((adSlider) {
      return InkWell(
        onTap: () async {
          if (await canLaunch(adSlider.urlLink)) {
            await launch(adSlider.urlLink);
          } else {
            print('Could not launch ${adSlider.urlLink}');
            // Optionally, show an error message to the user
          }
        },
        child: Container(
          margin: EdgeInsets.all(5.0),
          child: ClipRRect(
            borderRadius: BorderRadius.all(Radius.circular(10.0)),
            child: Stack(
              children: <Widget>[
                Image.network(adSlider.image, fit: BoxFit.cover, width: 1000.0),
                // Additional overlay widgets if needed
              ],
            ),
          ),
        ),
      );
    }).toList();

    return Column(children: [
      CarouselSlider(
        items: imageSliders,
        carouselController: _controller,
        options: CarouselOptions(
          autoPlay: true,
          enlargeCenterPage: true,
          aspectRatio: 2.0,
          onPageChanged: (index, reason) {
            setState(() {
              _current = index;
            });
          },
        ),
      ),
      Row(
        mainAxisAlignment: MainAxisAlignment.center,
        children: _adSliderList.asMap().entries.map((entry) {
          return GestureDetector(
            onTap: () => _controller.animateToPage(entry.key),
            child: Container(
              width: 12.0,
              height: 12.0,
              margin: EdgeInsets.symmetric(vertical: 8.0, horizontal: 4.0),
              decoration: BoxDecoration(
                shape: BoxShape.circle,
                color: (Theme.of(context).brightness == Brightness.dark
                    ? Colors.white
                    : Colors.black)
                    .withOpacity(_current == entry.key ? 0.9 : 0.4),
              ),
            ),
          );
        }).toList(),
      ),
    ]);
  }
}



RichText richText({String? text1, TextStyle? style1, String? text2, TextStyle? style2}) {
  return RichText(
    text: TextSpan(
      text: text1 ?? '',
      style: style1,
      children: [
        TextSpan(text: text2 ?? '', style: style2),
      ],
    ),
  );
}


///Models
//PropertyModel
// class PropertyModel {
//   String categoryTitle;
//   String img;
//   Color color;
//
//   PropertyModel({
//     required this.categoryTitle,
//     required this.img,
//     required this.color,
//   });
// }
//
// List<PropertyModel> propertyList() {
//   List<PropertyModel> list = [];
//
//   // var list1 = PropertyModel(categoryTitle: "مشاهدة جميع الاعلات", img: ic_home, color: Colors.yellow);
//   // list.add(list1);
//
//   var list2 = PropertyModel(categoryTitle: "شقق سكنية", img: ic_home, color: Colors.yellow);
//   list.add(list2);
//
//   var list3 = PropertyModel(categoryTitle: "فلل سكنية", img: ic_explore, color: Colors.blue);
//   list.add(list3);
//
//   var list4 = PropertyModel(categoryTitle: "فلل ادارية وتجارية", img: ic_home, color: Colors.red);
//   list.add(list4);
//
//   var list5 = PropertyModel(categoryTitle: "عمارات وابراج", img: ic_search, color: Colors.pink);
//   list.add(list5);
//
//   var list6 = PropertyModel(categoryTitle: "مكاتب تجارية", img: ic_home, color: Colors.red);
//   list.add(list6);
//
//   var list7 = PropertyModel(categoryTitle: "محلات تجارية", img: ic_home, color: Colors.red);
//   list.add(list7);
//
//   var list8 = PropertyModel(categoryTitle: "مستودعات", img: ic_notification, color: Colors.greenAccent);
//   list.add(list8);
//
//   var list9 = PropertyModel(categoryTitle: "سكن عمال", img: ic_notification, color: Colors.greenAccent);
//   list.add(list9);
//
//   var list10 = PropertyModel(categoryTitle: "بيوت شعبية", img: ic_home, color: Colors.red);
//   list.add(list10);
//
//   var list11 = PropertyModel(categoryTitle: "عقارات اخري", img: ic_notification, color: Colors.greenAccent);
//   list.add(list11);
//
//   var list12 = PropertyModel(categoryTitle: "خارج قطر", img: ic_home, color: Colors.red);
//   list.add(list12);
//
//   return list;
// }


// Helper method to determine category ID based on the category title
int determineCategoryId(String? categoryTitle) {
  switch (categoryTitle) {
    case "شقق سكنية":
      return 1; // Replace with actual category ID
    case "فلل سكنية":
      return 2;
    case "مستودعات":
      return 3;
    case "مكاتب تجارية":
      return 4;
    case "محلات تجارية":
      return 5;
    case "فلل ادارية وتجارية":
      return 6;
    case "عمارات وابراج":
      return 7;
    case "بيوت شعبية":
      return 8;
    case "سكن عمال":
      return 9;
    case "عقارات اخري":
      return 10;
    case "خارج قطر":
      return 11;
    default:
      return 0;
  }
}



// final List<Widget> imageSliders = imgList
//     .map((item) => Container(
//   child: Container(
//     margin: EdgeInsets.all(5.0),
//     child: ClipRRect(
//         borderRadius: BorderRadius.all(Radius.circular(10.0)),
//         child: Stack(
//           children: <Widget>[
//             Image.network(item, fit: BoxFit.cover, width: 1000.0),
//           ],
//         )),
//   ),
// ))
//     .toList();
//
//
// final List<String> imgList = [
//   'https://images.unsplash.com/photo-1520342868574-5fa3804e551c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6ff92caffcdd63681a35134a6770ed3b&auto=format&fit=crop&w=1951&q=80',
//   'https://images.unsplash.com/photo-1522205408450-add114ad53fe?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=368f45b0888aeb0b7b08e3a1084d3ede&auto=format&fit=crop&w=1950&q=80',
//   'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=94a1e718d89ca60a6337a6008341ca50&auto=format&fit=crop&w=1950&q=80',
//   'https://images.unsplash.com/photo-1523205771623-e0faa4d2813d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=89719a0d55dd05e2deae4120227e6efc&auto=format&fit=crop&w=1953&q=80',
//   'https://images.unsplash.com/photo-1508704019882-f9cf40e475b4?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=8c6e5e3aba713b17aa1fe71ab4f0ae5b&auto=format&fit=crop&w=1352&q=80',
//   'https://images.unsplash.com/photo-1519985176271-adb1088fa94c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a0c8d632e977f94e5d312d9893258f59&auto=format&fit=crop&w=1355&q=80'
// ];



List<Propertymodel> propertyModelList = [
  Propertymodel.PropertyModel(
    categoryTitle: "شقق سكنية",
    imagePath: "assets/images/apartment.png",
    backgroundcolor: Colors.lightBlueAccent.shade100,
  ),
  Propertymodel.PropertyModel(
    categoryTitle: "عمارات وابراج",
    imagePath: "assets/images/building.png",
    backgroundcolor: secondarycolor,
  ),
  Propertymodel.PropertyModel(
    categoryTitle: "مكاتب تجارية",
    imagePath: "assets/images/office.png",
    backgroundcolor: Colors.pinkAccent.shade100,
  ),
  Propertymodel.PropertyModel(
    categoryTitle: "خارج قطر",
    imagePath: "assets/images/out-qatar.png",
    backgroundcolor: Colors.lightBlueAccent.shade100,
  ),
  Propertymodel.PropertyModel(
    categoryTitle: "محلات تجارية",
    imagePath: "assets/images/shops.png",
    backgroundcolor: secondarycolor,
  ),
  Propertymodel.PropertyModel(
    categoryTitle: "فلل سكنية",
    imagePath: "assets/images/villa.png",
    backgroundcolor: Colors.pinkAccent.shade100,
  ),
  Propertymodel.PropertyModel(
    categoryTitle: "فلل ادارية وتجارية",
    imagePath: "assets/images/villaoffice.png",
    backgroundcolor: Colors.lightBlueAccent.shade100,
  ),
  Propertymodel.PropertyModel(
    categoryTitle: "مستودعات",
    imagePath: "assets/images/warehouse.png",
    backgroundcolor: Colors.lightBlueAccent.shade100,
  ),
  Propertymodel.PropertyModel(
    categoryTitle: "سكن عمال",
    imagePath: "assets/images/workerhouse.png",
    backgroundcolor: Colors.lightBlueAccent.shade100,
  ),
];

class PropertyModel {
}

class Propertymodel {
  final String categoryTitle;
  final String imagePath;
  final Color? backgroundcolor;
  bool isSelected;

  Propertymodel.PropertyModel({
    required this.categoryTitle,
    required this.imagePath,
    this.backgroundcolor,
    this.isSelected = false,
  });
}

