
import 'package:flutter/material.dart';
import 'package:nb_utils/nb_utils.dart';
import 'package:qatarmap/utils/images.dart';
import 'package:carousel_slider/carousel_slider.dart';
import 'package:flutter/cupertino.dart';

class HomeFargment extends StatefulWidget {
  const HomeFargment({super.key});

  @override
  State<HomeFargment> createState() => _HomeFargmentState();
}

class _HomeFargmentState extends State<HomeFargment> {

  late List<PropertyModel> _propertyList;

  late List<LandsModel> _landsList;

  late List<IndustrialModel> _industrialList;

  @override
  void initState() {
    super.initState();
    _propertyList = propertyList();

    _landsList = landsList();

    _industrialList = industrialList();

  }

  int _current = 0;
  final CarouselController _controller = CarouselController();


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
        actions: [
          Padding(
            padding: const EdgeInsetsDirectional.only(end: 8),
            child: IconButton(
              icon: Icon(Icons.notifications_none_rounded, size: 22, color: context.iconColor),
              onPressed: () {
                // Navigator.push(
                //   context,
                //   MaterialPageRoute(builder: (context) => NotificationScreen()),
                // );
              },
            ),
          ),
          // IconButton(
          //   icon: Icon(Icons.search, size: 22, color: context.iconColor),
          //   onPressed: () {
          //     // Navigator.push(
          //     //   context,
          //     //   MaterialPageRoute(builder: (context) => WishListScreen()),
          //     // );
          //   },
          // )
        ],
      ),

      body: SingleChildScrollView(
        child: Padding(
          padding: const EdgeInsets.all(8.0),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: <Widget>[

              ///slider
              Column(children: [
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
                        }
                        );
                      }),
                ),
                Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: imgList.asMap().entries.map((entry) {
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
                                .withOpacity(_current == entry.key ? 0.9 : 0.4)),
                      ),
                    );
                  }).toList(),
                ),
              ]),

              16.height,

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
              GridView.builder(
                scrollDirection: Axis.vertical,
                itemCount: _propertyList.length,
                physics: NeverScrollableScrollPhysics(),
                shrinkWrap: true,
                itemBuilder: (context, index) {
                  return Container(
                    margin: EdgeInsets.only(left: 6, right: 6, top: 6, bottom: 6),
                    decoration: boxDecorationWithShadow(
                      backgroundColor: context.cardColor,
                      boxShadow: defaultBoxShadow(),
                      borderRadius: BorderRadius.circular(12),
                    ),
                    child: Column(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: <Widget>[
                        Image.asset(_propertyList[index].img!, height: 35, width: 35, color: _propertyList[index].color),
                        15.height,
                        Text(
                          _propertyList[index].title!,
                          style: primaryTextStyle(),
                          textAlign: TextAlign.center,
                          maxLines: 2,
                        ),
                      ],
                    ),
                  ).onTap(
                        () {
                      // BankingPaymentDetails(headerText: _propertyList[index].title).launch(context);
                    },
                  );
                },
                gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(
                  crossAxisCount: 3,
                  childAspectRatio: 0.8,
                  mainAxisSpacing: 16,
                  crossAxisSpacing: 16,
                ),
              ),

              ///slider
              Padding(
                padding: const EdgeInsets.symmetric(vertical:20.0),
                child: Column(children: [
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
                          }
                          );
                        }),
                  ),
                ]),
              ),

              ///lands
              Padding(
                padding: EdgeInsetsDirectional.only(start: 8,bottom: 10),
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Text('الاراضي',
                      style: TextStyle(
                        fontWeight: FontWeight.bold,
                        fontSize: 26,
                      ),
                    ),
                    Text('176 اعلان',
                      style: TextStyle(
                          fontWeight: FontWeight.w500,
                          fontSize: 18,
                          color: Colors.red
                      ),
                    ),
                  ],
                ),
              ),
              GridView.builder(
                scrollDirection: Axis.vertical,
                itemCount: _landsList.length,
                physics: NeverScrollableScrollPhysics(),
                shrinkWrap: true,
                itemBuilder: (context, index) {
                  return Container(
                    margin: EdgeInsets.only(left: 6, right: 6, top: 6, bottom: 6),
                    decoration: boxDecorationWithShadow(
                      backgroundColor: context.cardColor,
                      boxShadow: defaultBoxShadow(),
                      borderRadius: BorderRadius.circular(12),
                    ),
                    child: Column(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: <Widget>[
                        Image.asset(_landsList[index].img!, height: 35, width: 35, color: _propertyList[index].color),
                        15.height,
                        Text(
                          _landsList[index].title!,
                          style: primaryTextStyle(),
                          textAlign: TextAlign.center,
                          maxLines: 2,
                        ),
                      ],
                    ),
                  ).onTap(
                        () {
                      // BankingPaymentDetails(headerText: _propertyList[index].title).launch(context);
                    },
                  );
                },
                gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(
                  crossAxisCount: 3,
                  childAspectRatio: 0.8,
                  mainAxisSpacing: 16,
                  crossAxisSpacing: 16,
                ),
              ),

              ///slider
              Padding(
                padding: const EdgeInsets.symmetric(vertical:20.0),
                child: Column(children: [
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
                          }
                          );
                        }),
                  ),
                ]),
              ),

              ///Industrial
              Padding(
                padding: EdgeInsetsDirectional.only(start: 8,bottom: 10,end: 8),
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Text('الصناعية',
                      style: TextStyle(
                        fontWeight: FontWeight.bold,
                        fontSize: 26,
                      ),
                    ),
                    Text('90 اعلان',
                      style: TextStyle(
                        fontWeight: FontWeight.w500,
                        fontSize: 18,
                        color: Colors.red
                      ),
                    ),

                  ],
                ),
              ),
              GridView.builder(
                scrollDirection: Axis.vertical,
                itemCount: _industrialList.length,
                physics: NeverScrollableScrollPhysics(),
                shrinkWrap: true,
                itemBuilder: (context, index) {
                  return Container(
                    margin: EdgeInsets.only(left: 6, right: 6, top: 6, bottom: 6),
                    decoration: boxDecorationWithShadow(
                      backgroundColor: context.cardColor,
                      boxShadow: defaultBoxShadow(),
                      borderRadius: BorderRadius.circular(12),
                    ),
                    child: Column(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: <Widget>[
                        Image.asset(_industrialList[index].img!, height: 35, width: 35, color: _propertyList[index].color),
                        15.height,
                        Text(
                          _industrialList[index].title!,
                          style: primaryTextStyle(),
                          textAlign: TextAlign.center,
                          maxLines: 2,
                        ),
                      ],
                    ),
                  ).onTap(
                        () {
                      // BankingPaymentDetails(headerText: _propertyList[index].title).launch(context);
                    },
                  );
                },
                gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(
                  crossAxisCount: 3,
                  childAspectRatio: 0.8,
                  mainAxisSpacing: 16,
                  crossAxisSpacing: 16,
                ),
              ),


            ],
          ),
        ),
      ),

    );
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
class PropertyModel {
  String? title = "";
  String? img = "";
  Color? color;

  PropertyModel({this.title, this.img, this.color});
}
List<PropertyModel> propertyList() {
  List<PropertyModel> list = [];

  var list1 = PropertyModel(title: "مشاهدة جميع الاعلات", img: ic_home, color: Colors.yellow);
  list.add(list1);

  var list2 = PropertyModel(title: "شقق سكنية", img: ic_home, color: Colors.yellow);
  list.add(list2);

  var list3 = PropertyModel(title: "فلل سكنية", img: ic_explore, color: Colors.blue);
  list.add(list3);

  var list4 = PropertyModel(title: "عمارات ابراج", img: ic_search, color: Colors.pink);
  list.add(list4);

  var list5 = PropertyModel(title: "عقارات اخري", img: ic_notification, color: Colors.greenAccent);
  list.add(list5);


  var list6 = PropertyModel(title: "خارج قطر", img: ic_home, color: Colors.red);
  list.add(list6);



  return list;
}

///lands
class LandsModel {
  String? title = "";
  String? img = "";
  Color? color;

  LandsModel({this.title, this.img, this.color});
}
List<LandsModel> landsList() {
  List<LandsModel> list = [];

  var list1 = LandsModel(title: "مشاهدة جميع الاعلات", img: ic_home, color: Colors.yellow);
  list.add(list1);

  var list2 = LandsModel(title: "اراضي سكنية", img: ic_home, color: Colors.yellow);
  list.add(list2);

  var list3 = LandsModel(title: "اراضي تجارية", img: ic_explore, color: Colors.blue);
  list.add(list3);

  var list4 = LandsModel(title: "اراضي زراعية", img: ic_search, color: Colors.pink);
  list.add(list4);

  var list5 = LandsModel(title: "اراضي صناعية", img: ic_notification, color: Colors.greenAccent);
  list.add(list5);


  var list6 = LandsModel(title: "خارج قطر", img: ic_home, color: Colors.red);
  list.add(list6);


  return list;
}

///Industrial
class IndustrialModel {
  String? title = "";
  String? img = "";
  Color? color;

  IndustrialModel({this.title, this.img, this.color});
}
List<IndustrialModel> industrialList() {
  List<IndustrialModel> list = [];

  var list1 = IndustrialModel(title: "مشاهدة جميع الاعلات", img: ic_home, color: Colors.yellow);
  list.add(list1);

  var list2 = IndustrialModel(title: "محلات تجارية ", img: ic_home, color: Colors.yellow);
  list.add(list2);

  var list3 = IndustrialModel(title: " مكاتب تجارية", img: ic_explore, color: Colors.blue);
  list.add(list3);

  var list4 = IndustrialModel(title: " مستودعات", img: ic_search, color: Colors.pink);
  list.add(list4);

  var list5 = IndustrialModel(title: "مساكن عمال", img: ic_notification, color: Colors.greenAccent);
  list.add(list5);


  var list6 = IndustrialModel(title: "خارج قطر", img: ic_home, color: Colors.red);
  list.add(list6);

  return list;
}




final List<Widget> imageSliders = imgList
    .map((item) => Container(
  child: Container(
    margin: EdgeInsets.all(5.0),
    child: ClipRRect(
        borderRadius: BorderRadius.all(Radius.circular(10.0)),
        child: Stack(
          children: <Widget>[
            Image.network(item, fit: BoxFit.cover, width: 1000.0),
            // Positioned(
            //   bottom: 0.0,
            //   left: 0.0,
            //   right: 0.0,
            //   child: Container(
            //     decoration: BoxDecoration(
            //       gradient: LinearGradient(
            //         colors: [
            //           Color.fromARGB(200, 0, 0, 0),
            //           Color.fromARGB(0, 0, 0, 0)
            //         ],
            //         begin: Alignment.bottomCenter,
            //         end: Alignment.topCenter,
            //       ),
            //     ),
            //     padding: EdgeInsets.symmetric(
            //         vertical: 10.0, horizontal: 20.0),
            //     child: Text(
            //       'No. ${imgList.indexOf(item)} image',
            //       style: TextStyle(
            //         color: Colors.white,
            //         fontSize: 20.0,
            //         fontWeight: FontWeight.bold,
            //       ),
            //     ),
            //   ),
            // ),
          ],
        )),
  ),
))
    .toList();


final List<String> imgList = [
  'https://images.unsplash.com/photo-1520342868574-5fa3804e551c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6ff92caffcdd63681a35134a6770ed3b&auto=format&fit=crop&w=1951&q=80',
  'https://images.unsplash.com/photo-1522205408450-add114ad53fe?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=368f45b0888aeb0b7b08e3a1084d3ede&auto=format&fit=crop&w=1950&q=80',
  'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=94a1e718d89ca60a6337a6008341ca50&auto=format&fit=crop&w=1950&q=80',
  'https://images.unsplash.com/photo-1523205771623-e0faa4d2813d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=89719a0d55dd05e2deae4120227e6efc&auto=format&fit=crop&w=1953&q=80',
  'https://images.unsplash.com/photo-1508704019882-f9cf40e475b4?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=8c6e5e3aba713b17aa1fe71ab4f0ae5b&auto=format&fit=crop&w=1352&q=80',
  'https://images.unsplash.com/photo-1519985176271-adb1088fa94c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a0c8d632e977f94e5d312d9893258f59&auto=format&fit=crop&w=1355&q=80'
];