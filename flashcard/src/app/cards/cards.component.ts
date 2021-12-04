/*
 * Author(s): Sehoan Choi (sc8zt), Ryu Patterson (rjp5cc)
 */
import { Component, OnInit } from '@angular/core';
import { HttpService } from '../http.service';

@Component({
  selector: 'app-cards',
  templateUrl: './cards.component.html',
  styleUrls: ['./cards.component.css'],
})
export class CardsComponent implements OnInit {
  public cards: Array<any> = [];
  public cardStyle: any;
  public cardBodyClass: any;

  public show_meaning: boolean = true;

  constructor(private httpService: HttpService) {
    this.httpService.getWordbook().subscribe((response) => {
      this.cards = response;
    });

    this.cardStyle = {
      boxShadow: '5px 5px 5px grey',
    };
    this.cardBodyClass = 'card-body';
  }

  flipCards() {
    this.show_meaning = !this.show_meaning;
  }

  ngOnInit(): void {}
}
